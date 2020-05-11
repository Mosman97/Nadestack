<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Auth;
use App\User;
use App\teamlog;
use App\Tools\TeamLogHelper;
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
            
            //Getting Logdata from the Team
            $team_logdata = teamlog::where("team_id","=",$team_id)->orderBy('created_at',"asc")->get();


            //If Team was just created we omit a sucess Message
            if ($request->input("message") != null) {


                return view("league.team_profile")->with("message", $request->input("message"));
            } else {

                //Returning Team-ID page without Notification that a Team
                return view("league.team_profile")->with("teamdata", $team)->with("logdata",$team_logdata);
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



            //Getting UserData from the Target-User who will be get kicked from the Team
            $kicked_user_info = User::where("id", "=", $userid)->get();

            //Sending Notification to the Person who got kicked
            Notification::send($kicked_user_info, new \App\Notifications\KickMemberNotification());
            
            //Updating UserData
            $kicked_user = User::where("id", "=", $userid)->update(array('team_id' => null));
            
            
            //Adding Kicked Player to the TeamLog
            
            
            $log_helper = new \App\Tools\TeamLogHelper();
            
            
                //TeamLogHelper::PLAYER_KICKED_ACTION_DB_NAME;
            
            
            
           
                $kicked_player_logentry = new teamlog;
                
                $kicked_player_logentry->action_id = \Ramsey\Uuid\Nonstandard\Uuid::uuid4();
                $kicked_player_logentry->action_parent_id = $log_helper->getPlayerKickedUUIDFromDatabase();
                $kicked_player_logentry->user_id = $userid;
                $kicked_player_logentry->team_id = $teamid;
                $kicked_player_logentry->action = TeamLogHelper::PLAYER_KICKED_ACTION_DB_NAME;
                $kicked_player_logentry->save();
                
                
                
                
            
            return back()->with("kick_message", $kicked_user_info[0]['username'] . " was successfully removed from your Team!");
        }
    }

}
