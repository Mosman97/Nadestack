<?php

namespace App\Http\Controllers\adminpanel;

use App\Admin_log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        /*
         * If Request is not AJAX it will show up the Custom Scheme
         */
        if (!$request->ajax()) {

            if ($request->input("search_query") == NULL) {

                //Retrieving 10 User per Page Sorted by Date DESC
                $users = User::select('users.*', 'teams.*')
                        ->leftJoin('teams', 'teams.team_id', "=", 'users.team_id')
                        ->orderBy('users.created_at', "desc")
                        ->paginate(2);

                return view("adminpanel.menus.players.playerindex")->with("users", $users);
            }

            //Search Request
            else {

                $search_input = $request->input("search_query");


                //Retrieving 50 Results
                $users = User::select('users.*', 'teams.*')
                        ->leftJoin('teams', 'teams.team_id', "=", 'users.team_id')
                        ->where("users.username", "like", $search_input . "%")
                        ->orWhere("users.id", "like", $search_input . "%")
                        ->orderBy('users.created_at', "desc")
                        ->paginate(2);

                return view("adminpanel.menus.players.playerindex")->with("users", $users);
            }
        }

        /* elseif ($request->ajax()) {


          $search_input = $request->input("search_input");


          //Retrieving 50 Results
          $users = User::select('users.*', 'teams.*')
          ->leftJoin('teams', 'teams.team_id', "=", 'users.team_id')
          ->where("users.username", "like", $search_input . "%")
          ->orWhere("users.id", "like", $search_input . "%")
          ->orderBy('users.created_at', "desc")
          ->limit(50)
          ->get()
          ->toArray();

          return json_encode($users);
          } */


        abort(404);
    }



    public function edit(Request $request, $player_id) {

        $user_data = User::where('id', "=", $player_id)->first();

        return view("adminpanel.menus.editplayer")->with("userdata", $user_data);
    }

    public function update(Request $request) {

        $player_id = $request->input("userid");
        $username = $request->input("username");
        $forname = $request->input("forname");
        $lastname = $request->input("lastname");
        $birthday = $request->input("birthday");
        $desc = $request->input("desc");
        //Social Media Inputs
        $twitter = $request->input("twitter");
        $instagram = $request->input("instagram");
        $twitch = $request->input("twitch");
        $yt = $request->input("youtube");


        $affected = DB::table('users')
            ->where('id', $player_id)
                ->update(array('username'=>$username,
                    'forname' => $forname,
                    'lastname' => $lastname,
                    'birthday' => $birthday,
                    'profiledescription' => $desc,
                    'twitter_url' => $twitter,
                    'instagram_url' => $instagram,
                    'twitch_url' => $twitch,
                    'youtube_url' => $yt
                    ));

         
        $admin_log = new Admin_log;
        $admin_log->user_id = Auth::user()->id;
        $admin_log->query = $affected;

        $admin_log->save();

        return back()->with("success", "Update");
    }
}
