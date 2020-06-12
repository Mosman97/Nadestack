<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class UserprofilePageController extends Controller {

    /**
     *
     * @param Request $request
     * @param type $userid the UserID
     */
    function getUserProfileData(Request $request, $username) {


        //Searching User

        $user_exits = User::where("username", "=", $username)->count();


        if ($user_exits == 1) {

            //Checking if the User is in a Team

            $user_data = User::where("username", "=", $username)->first();

            //Get the post count of the user
            $user_posts = DB::table('forum_posts')
                ->select(DB::raw('COUNT(forum_post_id) as post_count'))
                ->where('user_id' , '=' , $user_data->id)
                ->first();


            if ($user_data['team_id'] == NULL) {


               return view("useraccount.profile")
                   ->with("user_data", $user_data)
                   ->with("user_posts", $user_posts);
            }
            else {

                $user_data = User::where("username", "=", $username)
                        ->leftJoin('teams', 'users.team_id', '=', 'teams.team_id')
                        ->select('users.*', 'teams.team_name', 'teams.team_logo')
                        ->first();

               return view("useraccount.profile")
                   ->with("user_data", $user_data)
                   ->with("user_posts", $user_posts);
            }
        }
        else {
            abort(404);
        }
    }

}
