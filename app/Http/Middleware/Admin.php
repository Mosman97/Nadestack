<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class Admin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {



        if (isset(Auth::user()->nadestack_admin)) {

            if (Auth::user()->nadestack_admin) {

                //Returning Admin Dashboard
                return $next($request);
            } else {

                //Throwing 403 - User is not an Admin
                abort(403);
            }
        } else {
            //Returning User to Startpage if he is not an Admin
            return redirect("/");
        }
    }

}
