<?php

namespace App\Http\Controllers\nadestack;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
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
        //get comments of the articel
        $news_comments = newscomment::select('newscomments.*')
            ->where("news_id", "=", $news_id)
            ->leftJoin("users", "users.id", "=", "newscomments.user_id")
            ->orderBy('created_at', "asc")
            ->get();
        return view("news_example")->with("news_metadata", $news_metadata)->with("news_comments", $news_comments);
    }

    public function storeComment(Request $request, $news_id){

        $comment = $request -> input("comment");

        $new_comment = Newscomment::create(
            [   "comment" => $comment,
                "user_id" => Auth::user()->id,
                "news_id" => $news_id,
            ]);

        return redirect()->back()->with('success', 'comment created');

    }

}
