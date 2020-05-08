<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Team;

class TeamAdmin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if (isset(Auth::user()->team_id)) {

            //Retrieving Teamdata
            $team_data = Team::where("team_id", "=", Auth::user()->team_id)->get();

            //Checking if the requested User is allowed to Edit the Team
            if (Auth::user()->id == $team_data[0]['team_admin_id'] || Auth::user()->id == $team_data[0]['team_captain_1_id'] || Auth::user()->id == $team_data[0]['team_captain_2_id'] || Auth::user()->id == $team_data[0]['team_manger_id']) {
                return $next($request);
            } else {

                //If we not the Request will determinate and the  User will get redircted
                return redirect();
            }
        }
    }

}
