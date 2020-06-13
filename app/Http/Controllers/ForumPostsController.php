<?php

namespace App\Http\Controllers;

use App\forum_category;
use App\forum_report;
use Illuminate\Http\Request;
use DB;
use App\forum_post;
use App\forum_thread;
use Illuminate\Support\Facades\Auth;


class ForumPostsController extends Controller {

    public function index(Request $request,$forum_category_id, $forum_thread_id){

        $forum_posts = DB::table('forum_posts')
            ->where("forum_thread_id", "=", $forum_thread_id)
            ->join('users', 'forum_posts.user_id', '=', 'users.id' )
            ->paginate(8);

        $thread_data = DB::table('forum_threads')
            ->where("forum_thread_id", "=", $forum_thread_id)
            ->first();

        return view("forum.thread")
            ->with("forum_posts", $forum_posts)
            ->with("forum_thread_id",$forum_thread_id)
            ->with("thread_data", $thread_data);
    }

    public function createPost(Request $request,$forum_thread_id)
    {
        $post_text = $request -> input("posttext");

        $forum_post = Forum_post::create(
            [
                "user_id" => Auth::user()->id,
                "forum_thread_id" => $forum_thread_id,
                "forum_post_content" => $post_text,
            ]);

        $thread = forum_thread::find($forum_thread_id);
        $thread ->touch();

        return redirect()->back();
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

    public function reportPost(Request $request)
    {
        $report_message = $request -> input("report_message");
        $idreport = $request ->input("idreport");

        $forum_report = forum_report::create(
            [
                "user_id" => Auth::user()->id,
                "forum_post_id" => $idreport,
                "forum_report_message" => $report_message,
            ]);

        return redirect()->back()->with('success', 'Report ging raus du Hünd');
    }

    //
    public function deletePost(Request $request)
    {
        $deletemessage = $request -> input("deletemessage");
        $idreport = $request ->input("deletereport");

        $post_data = DB::table('forum_posts')
            ->where("forum_post_id", "=", $idreport)
            ->first();

        $delete = DB::table('forum_posts_deleted')
            ->insert(
                [
                    'post_content' => $post_data->forum_post_content,
                    'admin_id' => Auth::user()->id,
                    'user_id' => $post_data->user_id,
                    'forum_post_id' => $post_data->forum_post_id
                 ]
            );

        forum_post::where('forum_post_id', $idreport)->update(
            [
                'is_deleted' => '1',
                'forum_post_content' => $deletemessage
            ]
        );

        return redirect()->back();
    }

}
