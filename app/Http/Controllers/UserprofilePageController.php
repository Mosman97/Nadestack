<?php

namespace App\Http\Controllers;

use App\teamlog;
use Illuminate\Http\Request;
use DB;
use App\User;
use DateTime;

class UserprofilePageController extends Controller {

    /**
     *
     * @param Request $request
     * @param type $userid the UserID
     */
    function getUserProfileData(Request $request, $username) {


        //Searching User

        $user_exits = User::where("username", "=", $username)->count();


        if ($user_exits == 1) {

            //Checking if the User is in a Team

            $user_data = User::where("username", "=", $username)->first();

            //Get the post count of the user
            $user_posts = DB::table('forum_posts')
                ->select(DB::raw('COUNT(forum_post_id) as post_count'))
                ->where('user_id' , '=' , $user_data->id)
                ->first();

            //teamlogdata logic
            $logjoin = teamlog::select('teamlogs.*', 'teams.team_tag')
                ->where(['user_id' => $user_data->id, 'action' => 'member_joined'])
                ->leftJoin("teams", "teams.team_id", "=", "teamlogs.team_id")
                ->orderBy('teamlogs.updated_at', 'asc')
                ->get();

            $logleft = teamlog::where(['user_id' => $user_data->id, 'action' => 'member_joined'])
                ->orWhere(['user_id' => $user_data->id, 'action' => 'member_kicked'])
                ->orderBy('updated_at', 'asc')
                ->get();

            //Logdaten zusammenbauen
            $lograw = array();
            $groesse = count($logjoin);
            $j = 0;

            //mehrere Teams, anonsten überspringen
            if($groesse > 1){
                for($i = 0 ; $i < $groesse; $i++) {

                    //Periode zusammenbauen
                    $fdate = $logleft[$i]->created_at;
                    $tdate = $logjoin[$i]->created_at;
                    $datetime1 = new DateTime($fdate);
                    $datetime2 = new DateTime($tdate);
                    $interval = $datetime1->diff($datetime2);
                    $days = $interval->format('%a');

                    $lograw[$j] = array('team' => $logjoin[$i]->team_tag,
                        'jdate' => $logjoin[$i]->created_at,
                        'ldate' => $logleft[$i]->created_at,
                        'period' => $days);
                    $j = $i;
                }
            }
            //letzter Log für aktuelles Team
            $lograw[$j] = array('team' => $logjoin[$j]->team_tag,
                                'jdate' => $logjoin[$j]->created_at,
                                'ldate' => '-',
                                'period' => 'Current');


            //check user for current team
            if ($user_data['team_id'] == NULL) {


               return view("useraccount.profile")
                   ->with("user_data", $user_data)
                   ->with("user_posts", $user_posts)
                   ->with("lograw",$lograw);
            }
            else {

                $user_data = User::where("username", "=", $username)
                        ->leftJoin('teams', 'users.team_id', '=', 'teams.team_id')
                        ->select('users.*', 'teams.team_name', 'teams.team_logo')
                        ->first();

               return view("useraccount.profile")
                   ->with("user_data", $user_data)
                   ->with("user_posts", $user_posts)
                   ->with("lograw",$lograw);
            }
        }
        else {
            abort(404);
        }
    }

}
