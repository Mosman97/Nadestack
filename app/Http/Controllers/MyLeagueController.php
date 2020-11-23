<?php

namespace App\Http\Controllers;

use App\Season;
use App\Season_registration;
use Illuminate\Http\Request;
use DB;
use User;
use Auth;

class MyLeagueController extends Controller {

    public function ViewOrganiser(Request $request) {


        if (Auth::user()->team_id == NULL) {
            return view('league.myleague_wo_team');
        }
        $registered = Season_registration::where('team_id', Auth::user()->team_id)->first();
        if($registered == null)
        {
            $season = Season::where('id','>','1')->first(); //TODO nur temporäre Lösung!
            return view("league.league_register")
                ->with("season", $season);
        }
        else {
            return view("league.MyLeague");
        }
    }

}
