<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamRegisterController extends Controller {

    /**
     * Returns the Teamregister Page
     * @param Request $request HTTP-Request
     * @return view the View of the Teamregister Page
     */
    public function index(Request $request) {

        return view("league.TeamRegister");
    }

}
