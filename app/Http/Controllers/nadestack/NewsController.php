<?php

namespace App\Http\Controllers\nadestack;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use DB;
use Illuminate\Support\Facades\Auth;
use App\newscomment;


class NewsController extends Controller {
    /*     * -
     * Returns the News
     * @param Request $request
     * @return type
     */

    public function index(Request $request) {

        $news = News::orderBy('created_at', "desc")->paginate(5);
        return view("news")->with("news", $news);
    }

    public function getNewsDetails($news_id){

        //get Metadata of the articel
        $news_metadata = News::select('news.*')
            ->where("news_id", "=", $news_id)
            ->get();

        //get comments of the article
        $news_comments = newscomment::select('users.id', 'users.username', 'users.avatar_url','newscomments.*')
            ->where("news_id", "=", $news_id)
            ->leftJoin("users", "users.id", "=", "newscomments.user_id")
            ->orderBy('newscomments.created_at', "asc")
            ->paginate(10);

        return view("news_example")
            ->with("news_metadata", $news_metadata)
            ->with("news_comments", $news_comments);
    }

    public function storeComment(Request $request, $news_id){

        $comment = $request -> input("comment");

        $news_comment = Newscomment::create(
            [   "comment" => $comment,
                "user_id" => Auth::user()->id,
                "news_id" => $news_id,
            ]);

        return redirect()->back()->with('success', 'comment created');

    }

}
