<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamPageController extends Controller {

    public function index(Request $request, $team_id) {



        if ($request->input("message") != null) {


            return view("league.team_profile")->with("message", $request->input("message"));
        } else {

            //Returning Team-ID page without Notification that a Team was created
            return view("league.team_profile");
        }
    }

}
