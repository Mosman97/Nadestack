<?php

namespace App\Http\Controllers;

use App\forum_category;
use Illuminate\Http\Request;
use DB;
use App\forum_post;
use App\forum_thread;
use Illuminate\Support\Facades\Auth;


class ForumPostsController extends Controller {

    public function index(Request $request, $forum_thread_id){

        $forum_posts = forum_post::orderBy('forum_post_id', "asc")
            ->where("forum_thread_id", "=", $forum_thread_id)
            ->get();

        return view("forum.thread")->with("forum_posts", $forum_posts)->with("forum_thread_id",$forum_thread_id);
    }

    public function createPost(Request $request, $forum_thread_id)
    {
        $post_text = $request -> input("posttext");

        $forum_post = Forum_post::create(
            [
                "user_id" => Auth::user()->id,
                "forum_thread_id" => $forum_thread_id,
                "forum_post_content" => $post_text,
            ]);

        return redirect()->back()->with('success', 'comment created');
    }

    public function closeThread(Request $request, $forum_thread_id)
    {
        $post_text = $request -> input("deletemessage");

        $forum_post = Forum_post::create(
            [
                "user_id" => Auth::user()->id,
                "forum_thread_id" => $forum_thread_id,
                "forum_post_content" => $post_text,
            ]);

        $affected = DB::table('forum_threads')
            ->where('forum_thread_id', $forum_thread_id)
            ->update(['is_closed' => 1]);

        return redirect()->back()->with('success', 'thread closed');
    }

}
