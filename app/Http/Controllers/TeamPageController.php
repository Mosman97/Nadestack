<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Auth;
use App\User;
use Illuminate\Support\Facades\Notification;


class TeamPageController extends Controller {

    public function index(Request $request, $team_id) {

        //Checking if Team exits in Database
        $team = Team::where('team_id', '=', $team_id)->count();

        //If no Result is found in the Database we return 404
        if ($team == 0) {


            return view("news");
        } else if ($team == 1) {


            //Getting Data From Team

            $team = Team::where("team_id", '=', $team_id)->get()->toArray();


            //If Team was just created we omit a sucess Message
            if ($request->input("message") != null) {


                return view("league.team_profile")->with("message", $request->input("message"));
            } else {

                //Returning Team-ID page without Notification that a Team
                return view("league.team_profile")->with("teamdata", $team);
            }
        }
    }

    public function edit(Request $request, $team_id) {

        $team_data = Team::leftJoin('users', "users.team_id", "=", 'teams.team_id')->where('teams.team_id', '=', $team_id)->get();
        $user_data = User::where("team_id", "=", $team_id)->get();

        return view("league.team_settings")->with("team_data", $team_data)->with("user_data", $user_data);
    }

    /*
     * if a User leaves a Team
     */

    public function leaveTeam(Request $request) {

        //Notify the User that he successfully left the Team
        Auth::user()->notify(new \App\Notifications\LeaveTeamNotification());

        //Removing Team ID From User
        Auth::user()->team_id = NULL;
        Auth::user()->save();

        return redirect()->route('myleague');
    }

    public function kickPlayerFromTeam(Request $request, $teamid, $userid) {

        if (Auth::user()->team_id == $teamid) {


            $kicked_user_info = User::where("id", "=", $userid)->get();
            
        
         //  Notification::send($kicked_user_info,new \App\Notifications\);
  
          //  $kicked_user = User::where("id", "=", $userid)->notify(new \App\Notifications\LeaveTeamNotification($kicked_user_info[0]['id']));

            //Updating UserData
            //$kicked_user = User::where("id", "=", $userid)->update(array('team_id' => null));

           // return back()->with("success", "Kick!");
        }
    }

}
