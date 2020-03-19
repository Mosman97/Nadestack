<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use DB;
use Auth;
use Carbon\Carbon;

/**
 * This Controller handels all Matchpage related Actions
 */
class MatchPageController extends Controller {

    const TEAM_1 = "TEAM_1";
    const TEAM_2 = "TEAM_2";
    const VOTE_TIME_LIMT = "30";
    const VOTE_START_TIME_LIMIT = "60";
    
    
    
    function lol(Request $request) {
        
        
        return back();
    }


    /**
     * Returns the Matchroom with all needed Information 
     * @param string $match_id the Match-ID
     * @return view the View
     */
    function showMatchView(Request $request, $match_id) {




        $page = null;


        //Check if Match exists
        $match_exists = Match::where('match_id', '=', $match_id)->count();


        //If Result dosent equals one we have no record in the Database and can return the Startpage
        if ($match_exists != 1) {
            
        } else {

            //Retrieving Match-Data
            $match_data = DB::table('matches as m')
                    ->select('log.decider_map AS DECIDER_MAP', 'log.*', 'log.team_1_ready', 'log.team_2_ready', 'm.match_id', 'm.team_1_id AS TEAM_1_ID', 'm.team_2_id AS TEAM_2_ID', 'TEAM_1.team_name AS TEAMNAME_1', 'TEAM_2.team_name AS TEAMNAME_2', 'TEAM_1.team_logo AS TEAM_1_LOGO', 'TEAM_2.team_logo AS TEAM_2_LOGO', 'm.match_date AS MATCH_DATE', 'm.match_closed AS MATCH_STATUS', 'm.vetolog_id AS MAPVOTE_LOG', 'm.match_results AS MATCH_RESULTS')
                    ->leftJoin('teams AS TEAM_1', 'TEAM_1.team_id', '=', 'm.team_1_id')
                    ->leftJoin('teams AS TEAM_2', 'TEAM_2.team_id', '=', 'm.team_2_id')
                    ->leftJoin('mapvetos as log', 'log.vetolog_id', '=', 'm.vetolog_id')
                    ->get();


            // Retrieving all avaible maps in the Mapvoteprocess
            $map_data = DB::table('maps')->select('*')->orderBy('mapname', 'asc')->get();

            //Checking which maps are already taken

            $map_return_array = Array();

            $map_data = json_decode($map_data, true);



            for ($i = 0; $i < sizeof($map_data); $i++) {

                $temp_arr = Array("mapname" => null, "imageurl" => null, "taken" => false);

                //Checking if Map is Taken in this Match, Decider Map is omitted since its the leftover Map

                $veto_data = DB::table("mapvetos as log")
                        ->where("match_id", "=", $match_id)
                        ->where("team_1_ban_1", "=", $map_data[$i]['mapname'])
                        ->orWhere("team_2_ban_1", "=", $map_data[$i]['mapname'])
                        ->orWhere("team_2_ban_1", "=", $map_data[$i]['mapname'])
                        ->orWhere("team_1_ban_2", "=", $map_data[$i]['mapname'])
                        ->orWhere("team_2_ban_2", "=", $map_data[$i]['mapname'])
                        ->orWhere("team_1_pick", "=", $map_data[$i]['mapname'])
                        ->orWhere("team_2_pick", "=", $map_data[$i]['mapname'])
                        ->count();

                // Your Eloquent query executed by using get()
                // dd(DB::getQueryLog()); // Show results of log
                //IF the Query Result is 0 the map can still get picked
                if ($veto_data == 0) {

                    $temp_arr['mapname'] = $map_data[$i]['mapname'];
                    $temp_arr['imageurl'] = $map_data[$i]['imageurl'];
                    $temp_arr['taken'] = false;
                }
                //If the Counter is 1 the map cant be voted again
                elseif ($veto_data == 1) {

                    $temp_arr['mapname'] = $map_data[$i]['mapname'];
                    $temp_arr['imageurl'] = $map_data[$i]['imageurl'];
                    $temp_arr['taken'] = true;
                }
                //Pushing Temp Array on Return Array
                array_push($map_return_array, $temp_arr);
            }


            $match_posts = null;

            //Checking a page variable has been passed //TODO if Page varaibel is too high we have to handle the Error
            if ($request->input('page') != NULL) {

                
                //Setting pagevariable for passing
                $page = 10 * $request->input('page') - 10;

                //Retreving all matchposts
                $match_posts = DB::table('matchposts as m')->select('m.*', 'USER.username', 'User.avatar_url')->where('match_id', "=", $match_id)
                        ->leftJoin('users as USER', 'USER.id', '=', 'm.user_id')
                        ->orderBy('m.created_at', 'asc')
                        ->offset(10 * $request->input('page') - 10)
                        ->limit(10)
                        ->get();
                
                if(sizeof($match_posts) == 0) {
                    
                    
                    $page = 1;
                }
            } else {

                $page = 1;

                //Retreving all matchposts
                $match_posts = DB::table('matchposts as m')->select('m.*', 'USER.username', 'User.avatar_url')->where('match_id', "=", $match_id)
                        ->leftJoin('users as USER', 'USER.id', '=', 'm.user_id')
                        ->orderBy('m.created_at', 'asc')
                        ->offset(0)
                        ->limit(10)
                        ->get();
            }




            //IF Mapvote is already over we commit the Map
            //Returning the Matchroom with all the avaible Data
            //

              return view('league.matchroom')->with('match_data', $match_data)->with('map_data', $map_return_array)->with("matchposts", $match_posts)->with('match_id', $match_id)->with("page",$page);
        }
    }

    /**
     * creates a new Matchpost
     * @param Request $request
     */
    function createNewMatchposts(Request $request) {

        
    

        //In Order to add a new matchpost we need the ID of the User who posted the Comment and the Matchid
       /* $match_id = $request->input("matchid");

        //Check if Match exists
        $match_exists = Match::where('match_id', '=', $match_id)->count();


        //If Result dosent equals one we have no record in the Database and can return the Startpage
        if ($match_exists != 1 || $request->get('comment') == NULL) {

            return back()->withErrors(["Something went wrong please try again later!"]);
        } else {
            
         


            //Insert new Matchcomment

            $insert_query = DB::table('matchposts')->insert(['match_id' => $match_id, 'user_id' => auth()->user()->id, 'comment' => $request->get('comment'), 'created_at' => now(), 'updated_at' => now()]);

            return back();
        }*/
    }

    /**
     * starts the Mapvote
     * @param Request $request
     * @return view
     */
    function startMapvote(Request $request) {

        //In Order to add a new matchpost we need the ID of the User who posted the Comment and the Matchid
        $match_id = $request->input("matchid");

        //Check if Match exists
        $match_exists = Match::where('match_id', '=', $match_id)->count();


        //If a record is found we can proceed
        if ($match_exists == 1) {


            //Team-Request Variables
            $team_1_requesting = false;
            $team_2_requesting = false;

            //Teamname Variables for returning feedback Text
            $team_1_name = false;
            $team_2_name = false;



            //Checking if User has permission to Vote
            $check_vote_permission = DB::table('teams AS t')
                    ->where('t.team_admin_userid', '=', auth()->user()->id)
                    ->get()
                    ->toJson();


            //IF the User who requested the mapvote is authorized, You have to Test if Null is the correct value
            if (sizeof(json_decode($check_vote_permission, true)) > 0) {

                //Retriving Matchlog from Database
                $mapveto = DB::table('mapvetos AS log')
                        ->leftJoin('matches AS m', 'm.match_id', '=', 'log.match_id')
                        ->where('log.match_id', '=', $match_id)
                        ->get()
                        ->toJson();

                //Convert to JSON 
                $mapveto_json = json_decode($mapveto, true);
                $user_json = json_decode($check_vote_permission, true);


                //Check which team wants to start the mapvote
                if ($user_json[0]['team_id'] == $mapveto_json[0]['team_1_id']) {


                    $team_1_requesting = true;
                } else {

                    $team_2_requesting = true;
                }

                $teamname_1_query = DB::table('matches as m')
                        ->select('team1.team_name')
                        ->leftJoin('teams as team1', 'm.team_1_id', '=', "team1.team_id")
                        ->where('m.match_id', '=', $match_id)
                        ->get()
                        ->toJson();
                $teamname_1_json = json_decode($teamname_1_query, true);




                $teamname_2_query = DB::table('matches as m')
                        ->select('team2.team_name')
                        ->leftJoin('teams as team2', 'm.team_2_id', '=', "team2.team_id")
                        ->where('m.match_id', '=', $match_id)
                        ->get()
                        ->toJson();
                $teamname_2_json = json_decode($teamname_2_query, true);



                $team_1_name = $teamname_1_json[0]['team_name'];
                $team_2_name = $teamname_2_json[0]['team_name'];



                if ($team_1_requesting && $mapveto_json[0]['team_1_ready'] == 0) {

                    //Setting Team 1 ready
                    DB::table('mapvetos')
                            ->where('vetolog_id', $mapveto_json[0]['vetolog_id'])
                            ->update(['team_1_ready' => 1]);

                    return back()->with("mapvote_status", "Waiting for " . $team_2_name . " to confirm the Start of the Mapvote!");
                    //  return json_encode(false);
                } else if ($team_1_requesting && $mapveto_json[0]['team_1_ready'] == 1) {

                    return back()->with("mapvote_status", "Waiting for " . $team_2_name . " to confirm the Start of the Mapvote!");
                } else if ($team_2_requesting && $mapveto_json[0]['team_2_ready'] == 0) {

                    //Setting Team 2 ready
                    DB::table('mapvetos')
                            ->where('vetolog_id', $mapveto_json[0]['vetolog_id'])
                            ->update(['team_2_ready' => 1]);


                    return back()->with("mapvote_status", "Waiting for " . $team_1_name . " to confirm the Start of the Mapvote!");
                    //  return json_encode(false);
                } else if ($team_2_requesting && $mapveto_json[0]['team_2_ready'] == 1) {
                    return back()->with("mapvote_status", "Waiting for " . $team_1_name . " to confirm the Start of the Mapvote!");
                } else if ($mapveto_json[0]['team_1_ready'] == 1 && $mapveto_json[0]['team_2_ready'] == 1) {
                    // return back();
                    //  return json_encode(true);
                } else {
                    //  return back();
                    //  return json_encode(false);
                }
            }

            // return back();
        } else {

            //a non valid Match-ID was sumbitted. We will redirect the user
            // return back()->withErrors(['you cant start the Mapvote']);
        }
    }

    /**
     * Handles the Mapvote-Process
     * @param Request $request
     * @return type
     */
    function handleMapvote(Request $request) {

        //Checking if Request was performed using AJAX
        if ($request->ajax()) {

            //Checking if submitted Match-ID and Map-Value are valid
            $match_id = $request->input("match_id");
            $selected_map = $request->input("map");

            //Check if Match exists
            $match_exists = Match::where('match_id', '=', $match_id)->count();


            //If Result dosent equals one we have no record in the Database and can return the Startpage
            if ($match_exists != 1) {


                //Returning False if Match is not Found
                return json_encode(false);
            } else {

                //Checking if User is related to the Team and so is allowed to vote
                //Checking if User has permission to Vote
                $check_vote_permission = DB::table('teams AS t')
                        ->where('t.team_admin_userid', '=', auth()->user()->id)
                        ->get()
                        ->toJson();


                //Checking if we user is permitted to vote
                if (sizeof(json_decode($check_vote_permission, true)) == 0) {

                    return json_encode(false);
                } else {

                    //Now we gonna look which Team requested a ban
                    //Team-Request Variables
                    $team_1_requesting = false;
                    $team_2_requesting = false;


                    //TODO CHECKING IF MAP IS NOT ALREADY BANNED
                    //Retriving Matchlog from Database
                    $mapveto = DB::table('mapvetos AS log')
                            ->leftJoin('matches AS m', 'm.match_id', '=', 'log.match_id')
                            ->where('log.match_id', '=', $match_id)
                            ->get()
                            ->toJson();

                    //Convert to JSON 
                    $mapveto_json = json_decode($mapveto, true);
                    $user_json = json_decode($check_vote_permission, true);

                    //Check which team wants to start the mapvote
                    if ($user_json[0]['team_id'] == $mapveto_json[0]['team_1_id']) {


                        $team_1_requesting = true;
                    } elseif ($user_json[0]['team_id'] == $mapveto_json[0]['team_2_id']) {

                        $team_2_requesting = true;
                    }

                    /**
                     * Team-1 Veto Codeblock
                     */
                    if ($team_1_requesting) {

                        if ($mapveto_json[0]['team_1_ban_1'] == NULL) {

                            //Updating first bannned map
                            DB::table('mapvetos')
                                    ->where('vetolog_id', $mapveto_json[0]['vetolog_id'])
                                    ->update(['team_1_ban_1' => $selected_map, 'vote_timer' => Carbon::now()]);

                            return json_encode(True);
                        } elseif ($mapveto_json[0]['team_1_ban_2'] == NULL && $mapveto_json[0]['team_2_ban_1'] != NULL) {


                            //Updating second banned map
                            DB::table('mapvetos')
                                    ->where('vetolog_id', $mapveto_json[0]['vetolog_id'])
                                    ->update(['team_1_ban_2' => $selected_map, 'vote_timer' => Carbon::now()]);
                            return json_encode(True);
                        } elseif ($mapveto_json[0]['team_1_pick'] == NULL && $mapveto_json[0]['team_2_ban_2'] != NULL) {

                            //Updating Team 1 Mappick
                            DB::table('mapvetos')
                                    ->where('vetolog_id', $mapveto_json[0]['vetolog_id'])
                                    ->update(['team_1_pick' => $selected_map, 'vote_timer' => Carbon::now()]);
                            return json_encode(True);
                        } else {

                            return json_encode(False);
                        }
                    }

                    /**
                     * Team-2 Veto Codeblock
                     */ elseif ($team_2_requesting) {

                        if ($mapveto_json[0]['team_2_ban_1'] == NULL && $mapveto_json[0]['team_1_ban_1'] != NULL) {

                            //Updating first bannned map
                            DB::table('mapvetos')
                                    ->where('vetolog_id', $mapveto_json[0]['vetolog_id'])
                                    ->update(['team_2_ban_1' => $selected_map, 'vote_timer' => Carbon::now()]);
                            return json_encode(True);
                        } elseif ($mapveto_json[0]['team_2_ban_2'] == NULL && $mapveto_json[0]['team_1_ban_2'] != NULL) {

                            //Updating second banned map
                            DB::table('mapvetos')
                                    ->where('vetolog_id', $mapveto_json[0]['vetolog_id'])
                                    ->update(['team_2_ban_2' => $selected_map, 'vote_timer' => Carbon::now()]);
                            return json_encode(True);
                        } elseif ($mapveto_json[0]['team_2_pick'] == NULL && $mapveto_json[0]['team_1_pick'] != NULL) {


                            //Updating Team 2 Mappick
                            DB::table('mapvetos')
                                    ->where('vetolog_id', $mapveto_json[0]['vetolog_id'])
                                    ->update(['team_2_pick' => $selected_map, 'vote_timer' => Carbon::now()]);

                            //if Team 2 has picked his map the decidermap will be the last map left so in order to achieve this we have to check which maps will be played and which is left
                            //First getting all maps
                            $veto_log_status = DB::table('mapvetos')->where('vetolog_id', $mapveto_json[0]['vetolog_id'])->get()->toJson();

                            $json_vetolog_maps = json_decode($veto_log_status, true);

                            //Querys the map which will be the Decider Map
                            $decider_map_sql_query = DB::table('maps')
                                    ->where('mapname', '!=', $json_vetolog_maps[0]['team_1_ban_1'])
                                    ->where('mapname', '!=', $json_vetolog_maps[0]['team_1_ban_2'])
                                    ->where('mapname', '!=', $json_vetolog_maps[0]['team_2_ban_1'])
                                    ->where('mapname', '!=', $json_vetolog_maps[0]['team_2_ban_2'])
                                    ->where('mapname', '!=', $json_vetolog_maps[0]['team_1_pick'])
                                    ->where('mapname', '!=', $json_vetolog_maps[0]['team_2_pick'])
                                    ->where('offical_map', '=', 1)
                                    ->get();
                            //Converting Result Query to JSON Object

                            $json_decider_map_query = json_decode($decider_map_sql_query, true);
                            DB::table('mapvetos')
                                    ->where('vetolog_id', $mapveto_json[0]['vetolog_id'])
                                    ->update(['decider_map' => $json_decider_map_query[0]['mapname']]);


                            return json_encode(True);
                        } else {



                            return json_encode(False);
                        }
                    }
                }
            }
        }
    }

    /**
     * 
     * @param Request $request
     */
    function checkVoteStatus(Request $request) {

        if ($request->ajax()) {

            //Checking if submitted Match-ID and Map-Value are valid
            $match_id = $request->input("match_id");

            //Check if Match exists
            $match_exists = Match::where('match_id', '=', $match_id)->count();
            //If Result dosent equals one we have no record in the Database and can return the Startpage
            if ($match_exists != 1) {


                //Returning False if Match is not Found
                return json_encode(false);
            } else {

                //Checking if User is related to the Team and so is allowed to vote
                //Checking if User has permission to Vote
                $check_vote_permission = DB::table('teams AS t')
                        ->where('t.team_admin_userid', '=', auth()->user()->id)
                        ->get()
                        ->toJson();
                //Checking if we user is permitted to vote
                if (sizeof(json_decode($check_vote_permission, true)) == 0) {

                    return json_encode(false);
                } else {

                    //Now we gonna look which Team requested a ban
                    //Team-Request Variables
                    $team_1_requesting = false;
                    $team_2_requesting = false;

                    //Retriving Matchlog from Database
                    $mapveto = DB::table('mapvetos AS log')
                            ->leftJoin('matches AS m', 'm.match_id', '=', 'log.match_id')
                            ->where('log.match_id', '=', $match_id)
                            ->get()
                            ->toJson();

                    //Convert to JSON 
                    $mapveto_json = json_decode($mapveto, true);
                    $user_json = json_decode($check_vote_permission, true);

                    //Check which team wants to start the mapvote
                    if ($user_json[0]['team_id'] == $mapveto_json[0]['team_1_id']) {

                        $team_1_requesting = true;
                    } elseif ($user_json[0]['team_id'] == $mapveto_json[0]['team_2_id']) {

                        $team_2_requesting = true;
                    }

                    if ($team_1_requesting) {

                        if ($mapveto_json[0]['team_1_ban_1'] == NULL && $mapveto_json[0]['team_2_ban_1'] == NULL) {

                            return json_encode(True);
                        } elseif ($mapveto_json[0]['team_1_ban_2'] == NULL && $mapveto_json[0]['team_2_ban_1'] != NULL) {
                            return json_encode(True);
                        } elseif ($mapveto_json[0]['team_1_pick'] == NULL && $mapveto_json[0]['team_2_ban_2'] != NULL) {
                            return json_encode(True);
                        } else {

                            return json_encode(False);
                        }
                    } elseif ($team_2_requesting) {

                        if ($mapveto_json[0]['team_2_ban_1'] == NULL && $mapveto_json[0]['team_1_ban_1'] != null) {

                            return json_encode(True);
                        } elseif ($mapveto_json[0]['team_2_ban_2'] == NULL && $mapveto_json[0]['team_1_ban_2'] != NULL) {
                            return json_encode(True);
                        } elseif ($mapveto_json[0]['team_1_pick'] != NULL && $mapveto_json[0]['team_2_pick'] == NULL) {
                            return json_encode(True);
                        } else {

                            return json_encode(False);
                        }
                    }
                }
            }
        }
    }

    /**
     * Checks if the given Match-ID is Valid
     * @param boolean $valid
     */
    function checkIfMatchIDIsValid($match_id) {

        //Check if Match exists
        $match_exists = Match::where('match_id', '=', $match_id)->count();
        //If Result dosent equals one we have no record in the Database and can return False
        if ($match_exists != 1) {

            return False;
        }

        return True;
    }

    /**
     * Gets the Name of the Team 1
     * @param type $match_id
     */
    function getTeam1Name($match_id) {

        $teamname_1_query = DB::table('matches as m')
                ->select('team1.team_name')
                ->leftJoin('teams as team1', 'm.team_1_id', '=', "team1.team_id")
                ->where('m.match_id', '=', $match_id)
                ->get()
                ->toJson();
        $teamname_1_json = json_decode($teamname_1_query, true);


        return $teamname_1_json[0]['team_name'];
    }

    /**
     * Gets the Name of Team 2
     * @param type $match_id 
     */
    function getTeam2Name($match_id) {


        $teamname_2_query = DB::table('matches as m')
                ->select('team2.team_name')
                ->leftJoin('teams as team2', 'm.team_2_id', '=', "team2.team_id")
                ->where('m.match_id', '=', $match_id)
                ->get()
                ->toJson();
        $teamname_2_json = json_decode($teamname_2_query, true);

        return $teamname_2_json[0]['team_name'];
    }

    function checkIfUserIsAllowedToVote() {

        //Checking if User is related to the Team and so is allowed to vote
        $check_vote_permission = DB::table('teams AS t')
                ->where('t.team_admin_userid', '=', auth()->user()->id)
                ->get()
                ->toJson();
        //Checking if we user is permitted to vote
        if (sizeof(json_decode($check_vote_permission, true)) == 0) {

            //Returning Null if no Entry in the Database hasd been found
            return null;
        } else {

            //Returning the User-Data from the DB-Query as a JSON-Object
            return json_decode($check_vote_permission, true);
        }
    }

    function getMatchLogData($match_id) {

        //Retriving Matchlog from Database
        $mapveto = DB::table('mapvetos AS log')
                ->leftJoin('matches AS m', 'm.match_id', '=', 'log.match_id')
                ->where('log.match_id', '=', $match_id)
                ->get()
                ->toJson();

        return json_decode($mapveto, true);
    }

    /**
     * checks which Team belongs to the requested User
     * @param type $user_data userdata as a JSON-Object
     * @param type $match_data matchdatas as a JSON-Object
     * @return string
     */
    function getTeamMembership($user_data, $match_data) {

        //Team-Request Variables
        $team_1_requesting = false;
        $team_2_requesting = false;

        //Team Const, User can only vote if he belong to Team 1 or Team 2
        $team_1 = "TEAM_1";
        $team_2 = "TEAM_2";

        //Check which team wants to start the mapvote
        if ($user_data[0]['team_id'] == $match_data[0]['team_1_id']) {

            $team_1_requesting = true;
        } elseif ($user_data[0]['team_id'] == $match_data[0]['team_2_id']) {

            $team_2_requesting = true;
        }

        if ($team_1_requesting) {


            return $team_1;
        } elseif ($team_2_requesting) {


            return $team_2;
        }

        return null;
    }

    /**
     * Handles the Readystate of the Teams, gets only called via the Start Mapvote Button
     * @param Request $request
     */
    function MapvoteReadyGuard(Request $request) {


        $match_id = $request->input("matchid");
        $user_data = null;

        if (self::checkIfMatchIDIsValid($match_id)) {


            if (self::checkIfUserIsAllowedToVote() != NULL) {

                $user_data = self::checkIfUserIsAllowedToVote();
                $match_data = self::getMatchlogData($match_id);


                $teammembership = self::getTeamMembership($user_data, $match_data);


                if (strcmp($teammembership, self::TEAM_1) == 0) {

                    if ($match_data[0]['team_1_ready'] == 0) {

                        //Setting Team 1 ready
                        DB::table('mapvetos')
                                ->where('vetolog_id', $match_data[0]['vetolog_id'])
                                ->update(['team_1_ready' => 1, 'vote_timer' => Carbon::now()]);

                        //IF Team 2 already confirmed the Ready State we can set the Time of the Votestart
                        if ($match_data[0]['team_2_ready'] == 1) {


                            //Setting Time
                            DB::table('mapvetos')
                                    ->where('vetolog_id', $match_data[0]['vetolog_id'])
                                    ->update(['vote_timer' => Carbon::now()]);
                        }

                        return back()->with("mapvote_status", "Wating for Team 2 to start the Mapvote!");
                    }

                    return back()->with("mapvote_status", "Wating for Team 2 to start the Mapvote!");


                    //TODO Check if is in  Time
                } else if (strcmp($teammembership, self::TEAM_2) == 0) {

                    if ($match_data[0]['team_2_ready'] == 0) {

                        //Setting Team 1 ready
                        DB::table('mapvetos')
                                ->where('vetolog_id', $match_data[0]['vetolog_id'])
                                ->update(['team_2_ready' => 1, 'vote_timer' => Carbon::now()]);



                        if ($match_data[0]['team_1_ready'] == 1) {


                            //Setting Time
                            DB::table('mapvetos')
                                    ->where('vetolog_id', $match_data[0]['vetolog_id'])
                                    ->update(['vote_timer' => Carbon::now()]);
                        }


                        return back()->with("mapvote_status", "Wating for Team 1 to start the Mapvote");
                    }


                    return back()->with("mapvote_status", "Wating for Team 1 to start the Mapvote");
                }


                //Not in a related Team to the Match, we Inform the User that he is not authorized
                else {

                    return back()->with("mapvote_status", "Not Authhorized");
                }
            }
        } else {

            return back()->with("mapvote_status", "Not Authhorized");
        }
    }

    /**
     * Check if the Vote of a Map is in time
     * @param Request $request
     */
    function checkVoteTime(Request $request) {

        //
        if ($request->ajax()) {
            $match_id = $request->input("match_id");

            if (self::checkIfMatchIDIsValid($match_id)) {

                $match_data = self::getMatchlogData($match_id);

                if ($match_data[0]['vote_timer'] != NULL) {


                    $date1 = $match_data[0]['vote_timer'];
                    $request_timestamp = Carbon::now();
                    $sec_diff = $request_timestamp->diffInSeconds($date1);


                    if ($sec_diff < self::VOTE_TIME_LIMT) {
                        //Returning the Seconds left to vote
                        return json_encode(self::VOTE_TIME_LIMT - $sec_diff);
                    } else {

                        //Closing Mapvote
                        DB::table('mapvetos')
                                ->where('vetolog_id', $match_data[0]['vetolog_id'])
                                ->update(['team_1_ready' => 0, 'team_2_ready' => 0, 'vote_timer' => null]);

                        return json_encode(False);
                    }
                } else {


                    //Returning False
                    return json_encode(FALSE);
                }
            } else {


                return "Bad Request";
            }
        }
    }

    /**
     * Checks if the Other Team is Ready- AJAX ONLY CALL
     * @param Request $request
     */
    function checkTeamReadyStatus(Request $request) {

        if ($request->ajax()) {

            $match_id = $request->input("match_id");

            /**
             * Return Array for Information Exchange
             */
            $return_arr = Array("TEAM_1_NAME" => NULL,
                "TEAM_1_VOTETIME_LEFT" => NULL,
                "TEAM_1_READY" => FALSE,
                "TEAM_1_VOTETIME_LEFT" => FALSE,
                "TEAM_2_NAME" => NULL,
                "TEAM_2_VOTETIME_LEFT" => NULL,
                "TEAM_2_READY" => FALSE);

            if (self::checkIfMatchIDIsValid($match_id)) {

                $match_data = self::getMatchlogData($match_id);

                if ($match_data[0]['team_1_ready'] == 1 && $match_data[0]['team_2_ready'] == 0) {


                    $return_arr['TEAM_2_NAME'] = self::getTeam2Name($match_id);

                    $return_arr['TEAM_1_READY'] = TRUE;


                    //Setting Time 

                    $date1 = $match_data[0]['vote_timer'];
                    $request_timestamp = Carbon::now();
                    $sec_diff = $request_timestamp->diffInSeconds($date1);


                    $return_arr['TEAM_2_VOTETIME_LEFT'] = self::VOTE_START_TIME_LIMIT - $sec_diff;

                    return json_encode($return_arr);
                    // return json_encode(self::getTeam2Name($match_id));
                } elseif ($match_data[0]['team_2_ready'] == 1 && $match_data[0]['team_1_ready'] == 0) {

                    $return_arr['TEAM_2_READY'] = TRUE;

                    $return_arr['TEAM_1_NAME'] = self::getTeam1Name($match_id);

                    //Setting Time 
                    $date1 = $match_data[0]['vote_timer'];
                    $request_timestamp = Carbon::now();
                    $sec_diff = $request_timestamp->diffInSeconds($date1);

                    $return_arr['TEAM_1_VOTETIME_LEFT'] = self::VOTE_START_TIME_LIMIT - $sec_diff;

                    return json_encode($return_arr);
                    // return json_encode(self::getTeam1Name($match_id));
                } elseif ($match_data[0]['team_1_ready'] == 1 && $match_data[0]['team_2_ready'] == 1) {

                    $return_arr['TEAM_1_READY'] = TRUE;
                    $return_arr['TEAM_2_READY'] = TRUE;

                    return json_encode($return_arr);
                } elseif ($match_data[0]['team_1_ready'] == 0 && $match_data[0]['team_2_ready'] == 0) {


                    return json_encode($return_arr);
                }
            }

            return json_encode(false);
        }

        return json_encode(false);
    }

}
