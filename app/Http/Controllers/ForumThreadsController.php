<?php

namespace App\Http\Controllers;

use App\forum_category;
use Illuminate\Http\Request;
use DB;
use App\forum_post;
use App\forum_thread;
use Illuminate\Support\Facades\Auth;


class ForumThreadsController extends Controller {

    public function index(Request $request, $forum_category_id){

        $forum_thread = forum_thread::orderBy('forum_thread_id', "asc")
            ->where("forum_category_id", "=", $forum_category_id)
            ->get();

        return view("forum.thread_overview")->with("forum_thread", $forum_thread)->with("forum_category_id",$forum_category_id);
    }




    public function threadCreator(Request $request, $forum_category_id)
    {

       return view("forum.create_thread")->with("forum_category_id", $forum_category_id);
    }




    public function newThread(Request $request, $forum_category_id){

        $thread_title = $request -> input("thread-title");
        $thread_text = $request -> input("thread-text");

        $forum_thread_id = DB::table('forum_threads')->insertGetId(
            [
                "forum_thread_title" => $thread_title,
                "user_id" => Auth::user()->id,
                "forum_category_id" => $forum_category_id,
            ]);


        $forum_post = forum_post::create(
            [
                "user_id" => Auth::user()->id,
                "forum_thread_id" => $forum_thread_id,
                "forum_post_content" => $thread_text,
            ]);

        return redirect()->route('viewthread', ['forum_category_id' => $forum_category_id, 'forum_thread_id' => $forum_thread_id]);

    }

}
