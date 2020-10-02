<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;

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

        return view("adminpanel.menus.teams.editteam")->with("teamdata", $team_data);
    }


    public function update(Request $request, $team_id) {
        //
    }

}
