<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Auth;
use App\Notification;

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

    public function leaveTeam(Request $request) {

        

        //Removing Team ID From User
     //   Auth::user()->team_id = NULL;
        Auth::user()->save();
        
        Auth::user()->notify(new \App\Notifications\LeaveTeamNotification());

        return redirect()->route('myleague');
        // return view("league.myleague_wo_team")->with("success","you successfully left your Team");
    }

}
