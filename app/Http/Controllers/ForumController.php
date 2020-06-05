<?php

namespace App\Http\Controllers;

use App\forum_category;
use App\forum_post;
use Illuminate\Http\Request;
use DB;


class ForumController extends Controller {

    public function index(Request $request){

        $forum_category = DB::table('forum_categories')
            ->select("forum_categories.forum_category_id","forum_categories.forum_category_title","forum_categories.forum_category_icon","forum_categories.forum_category_text",DB::raw('COUNT(forum_threads.forum_thread_id) as thread_count'))
            ->leftJoin("forum_threads","forum_threads.forum_category_id","=","forum_categories.forum_category_id")
            ->groupBy('forum_categories.forum_category_id')
            ->orderBy('forum_categories.forum_ranking')
            ->get();

        $total_posts  = forum_post::all()->count();

        return view("forum.forum_overview")
            ->with("forum_category", $forum_category)
            ->with("total_post", $total_posts);
    }

}
