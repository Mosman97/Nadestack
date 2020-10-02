<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

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
}
