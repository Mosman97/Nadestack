<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeagueController extends Controller {

    /**
     * Get Called via GET
     * @param Request $request
     * @return type
     */
    public function index(Request $request) {


        //Returns Index of Leagueadminstration.
        return view("adminpanel.menus.league.leagueindex");
    }

}
