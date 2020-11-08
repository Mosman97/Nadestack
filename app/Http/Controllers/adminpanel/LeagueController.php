<?php

namespace App\Http\Controllers\adminpanel;

use App\Admin_log;
use App\Http\Controllers\Controller;
use App\Season;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeagueController extends Controller {

    public function index(Request $request) {


        $today = date("Ymd");
        //zuerst wird geschaut, welche die aktive Season ist, falls keine vorhanden, kann man eine neue Season starten
        $league_state = 1;
        $active_season = Season::where("is_active", "" , "true")
            ->orWhere('season_start', '>', $today)
            ->first();

        if($active_season == null) //zukünftige season muss erstellt werden
        {
            return view("adminpanel.menus.league.leagueindex")
                ->with("league_state", $league_state);
        }

        if($active_season->reg_start > $today){ //wir befinden uns VOR der Registrierung
            $league_state = 2;

            return view("adminpanel.menus.league.leagueindex")
                ->with("league_state", $league_state)
                ->with("active_season",$active_season);
        }
        if($active_season->reg_end > $today){ //wir befinden uns IN der Registrierung
            $league_state = 3;

            return view("adminpanel.menus.league.leagueindex")
                ->with("league_state", $league_state)
                ->with("active_season",$active_season);
        }
        if($active_season->season_start > $today){ //wir befinden uns zwischen Registrierung und Season
            $league_state = 4;

            return view("adminpanel.menus.league.leagueindex")
                ->with("active_season",$active_season)
                ->with("league_state", $league_state);
        }
        if($active_season->season_end > $today){ //wir befinden uns in der aktiven Season
            $league_state = 5;

            return view("adminpanel.menus.league.leagueindex")
                ->with("league_state", $league_state);
        }

        return(abort(404));
    }

    public function startnewseason(Request $request) {

        $newseason = Season::create(
            [
                'name' => $request -> input("seasonname"),
                'season_start' => $request -> input("seasonstart"),
                'season_end' => $request -> input("seasonend"),
                'team_limit' => $request -> input("teamlimit"),
                'reg_start' => $request -> input("regstart"),
                'reg_end' => $request -> input("regend"),
                'is_active' => false,
            ]
        );

        $admin_log = new Admin_log;
        $admin_log->user_id = Auth::user()->id;
        $admin_log->query = $newseason;
        $admin_log->save();

        $users = User::all();
        foreach ($users as $user) {
            echo $user->notify(new \App\Notifications\SeasonStartNotification());
        }

        $league_state = 0;
        return view("adminpanel.menus.league.leagueindex")
            ->with("league_state", $league_state);
    }

}
