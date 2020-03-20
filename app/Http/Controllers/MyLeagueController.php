<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use User;
use Auth;

class MyLeagueController extends Controller {

    public function ViewOrganiser(Request $request) {


        if (Auth::user()->team_id == NULL) {


            return view('league.MyLeague');

        } else {


            // return view("league.")
        }
    }

}
