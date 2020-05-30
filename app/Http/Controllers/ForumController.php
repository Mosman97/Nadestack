<?php

namespace App\Http\Controllers;

use App\forum_category;
use Illuminate\Http\Request;
use DB;


class ForumController extends Controller {

    public function index(Request $request){

        $forum_category = forum_category::orderBy('forum_ranking', "asc")->get();

        return view("forum.forum_overview")->with("forum_category", $forum_category);
    }

}
