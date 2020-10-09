<?php

namespace App\Http\Controllers\adminpanel;

use Illuminate\Support\Facades\Auth;
use App\Admin_log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Rules\TeamNameNotTaken;
use App\Rules\TeamTagNotTaken;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {


        //If no Searchparameter is omitted we return Team sroted by Date
        if ($request->input('search_query') == NULL) {

            //Retrieving 10 Teams per Page Sorted by Date DESC
            $teams = Team::orderBy('created_at', "desc")->paginate(10);

            return view("adminpanel.menus.teams.teamindex")->with("teams", $teams);
        } else {

            $search_input = $request->input("search_query");


            //Retrieving 50 Results
            $teams = Team::where("team_name", "like", $search_input . "%")
                    ->orWhere("team_id", "like", $search_input . "%")
                    ->orWhere("team_tag", "like", $search_input . "%")
                    ->orderBy('created_at', "desc")
                    ->paginate(10);

            return view("adminpanel.menus.teams.teamindex")->with("teams", $teams);
        }
    }

    public function edit(Request $request, $team_id) {

        $team_data = Team::where('team_id', "=", $team_id)->first();



        /* $team_roles = Team::select('teams.*', "users.id", "users.username")->leftJoin('users', "users.team_id", "=", 'teams.team_id')
          ->where('teams.team_id', '=', $team_id)
          ->first();
          var_dump($team_roles);
          die(); */

        $team_members = User::select('username', 'id', 'avatar_url', 'team_role')->where("team_id", "=", $team_id)
                        ->orderBy('team_role', "ASC")->get();


        return view("adminpanel.menus.teams.editteam")->with("teamdata", $team_data)->with("teammembers", $team_members);
    }

    /**
     * Removes the Current Teamlogo and replaces it with the Default Logo.
     * @param Request $request
     * @param int $team_id
     */
    public function removeTeamlogo(Request $request, $team_id) {
        
    }

    /**
     * Updates Team specific Parameters for the given Player.
     * @param Request $request
     * @param type $team_id
     */
    public function updatePlayer(Request $request, $team_id) {



        if (request()->get("kick") != null) {

            //Kick User From Team

            $userdata = User::where("id", "=", $request->get('userid'))->first();
            $userdata->team_id = null;
            $userdata->team_role = null;

            $userdata->save();

            //Creating Adminlog
            $admin_log = new Admin_log;
            $admin_log->user_id = Auth::user()->id;
            $admin_log->query = $userdata;
            $admin_log->save();



            return redirect()->back()->with("msg", "Player removed from Team");
        } else {

            $userdata = User::where("id", "=", $request->get('userid'))->first();

            $userdata->team_role = $request->get('teamrole');

            $userdata->save();

            //Creating Adminlog
            $admin_log = new Admin_log;
            $admin_log->user_id = Auth::user()->id;
            $admin_log->query = $userdata;
            $admin_log->save();

            return redirect()->back()->with("msg", "Player updated");
        }
    }

    public function searchUser(Request $request) {




        $searchtext = $request->get("searchtext");


        $user_results = DB::table("users")->select("id", "username")->where("username", "LIKE", "%" . $searchtext . "%")->where("team_id", "=", null)->orWhere('id', "LIKE", $searchtext . "%")->where("team_id", "=", null)->limit(50)->get()->toJson();
        echo $user_results;
    }

    /**
     * Adds a New User to a Team as a Player
     * @param Request $request
     * @param int $team_id Team-ID where the User will join
     */
    public function addUser(Request $request, $team_id) {


        //Adding User to Team
        $userdata = User::where("id", "=", $request->get('userid'))->first();
        $userdata->team_id = $team_id;
        $userdata->team_role = 4;

        $userdata->save();

        //Creating Adminlog
        $admin_log = new Admin_log;
        $admin_log->user_id = Auth::user()->id;
        $admin_log->query = $userdata;
        $admin_log->save();

        echo(json_encode(true));
    }

    /**
     * Updates all Teamsettings
     * @param Request $request
     * @param type $team_id
     */
    public function update(Request $request, $team_id) {

        //Validate Input
        $team_id = $team_id;
        $teamname = $request->input("teamname");
        $teamtag = $request->input("teamtag");
        $organame = $request->input("orga");
        $website = $request->input("website");
        $desc = $request->input("desc");
        //Social Media Inputs
        $twitter = $request->input("twitter");
        $instagram = $request->input("instagram");
        $twitch = $request->input("twitch");
        $yt = $request->input("youtube");


        //Validating Rules for a new Team Ressource NOTE: Missing unique checking for Teamname and Teamtag when these parameters get updated
        $team_validation_rules = [
            'teamname' => ['bail', 'required', 'string', 'min:2', 'max:30'],
            'teamtag' => ['bail', 'required', 'min:2', 'max:12'],
        ];
        //Custom Validation Error-Messages
        $team_validation_msg = [
            'teamname.required' => 'Teamname cant be empty',
            'teamname.min' => 'Teamname is too short',
            'teamname.max' => 'Teamname can only contain 30 characters',
            'teamtag.required' => 'Teamtag cant be empty',
        ];

        // 'password.min' => 'das Passwort muss mindestens 6 Zeichen lang sein',

        $validator = Validator::make($request->all(), $team_validation_rules, $team_validation_msg
        );

        if ($validator->fails()) {
            $message = $validator->errors();

            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        } else {


            $team_data = Team::where('team_id', "=", $team_id)->first();

            $team_data->team_name = $teamname;
            $team_data->team_tag = $teamtag;
            $team_data->team_desc = $desc;
            // $team_data->$team_orga = $organame;
            //Updating Socials
            $team_data->team_website = $website;
            $team_data->twitter_url = $twitter;
            $team_data->twitch_url = $twitch;
            $team_data->instagram_url = $instagram;
            $team_data->youtube_url = $yt;

            $team_data->save();



            return redirect()->back()->with('message', 'Updated TeamSettings!');
        }
    }

}
