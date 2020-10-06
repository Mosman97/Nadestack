<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;
use App\User;
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

        $team_members = User::select('username','id', 'avatar_url', 'team_role')->where("team_id", "=", $team_id)
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
