<?php

/**
 * Checks if the Create Team Request comes from a User who is currently in no Team
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class teamowner {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {


        if (Auth::user()->team_id == NULL) {

            return $next($request);
        }

        return redirect("/");
    }

}
