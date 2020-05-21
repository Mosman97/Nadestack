<?php

namespace App\Http\Controllers;

use App\forum_category;
use Illuminate\Http\Request;
use DB;
use App\forum_post;
use App\forum_thread;
use Illuminate\Support\Facades\Auth;


class ForumController extends Controller {
    /*     * -
     * Returns the News
     * @param Request $request
     * @return type
     */

    public function index(Request $request){

        $forum_category = forum_category::orderBy('forum_ranking', "asc")->get();

        return view("forum.forum_overview")->with("forum_category", $forum_category);
    }

}
