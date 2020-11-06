<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use App\Season;
use Illuminate\Http\Request;

class LeagueController extends Controller {

    public function index(Request $request) {

        //zuerst wird geschaut, welche die aktive Season ist, falls keine vorhanden, kann man eine neue Season starten
        $start_league = 1;
        $active_season = Season::where("active", "" , "true");

        if($active_season != null)
        {
            $start_league = 0;
        }

        return view("adminpanel.menus.league.leagueindex")
            ->with("start_league", $start_league);
    }

    public function startnewseason(Request $request) {

        $newseason = Season::create(
            [
                'name' => $request -> input("seasonname"),
                'season_start' => $request -> input("seasonstart"),
                'season_end' => $request -> input("seasonend"),
                'team_limit' => $request -> input("teamlimit"),
                'reg_end' => $request -> input("regend"),
            ]
        );

        return redirect();
    }

}
