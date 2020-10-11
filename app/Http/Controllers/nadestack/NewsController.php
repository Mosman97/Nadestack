<?php

namespace App\Http\Controllers\nadestack;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use DB;
use Illuminate\Support\Facades\Auth;
use App\newscomment;
use Illuminate\Support\Facades\Validator;


class NewsController extends Controller {
    /*     * -
     * Returns the News
     * @param Request $request
     * @return type
     */

    public function index(Request $request) {

        $news = News::where('is_published',"=","1")->orderBy('created_at', "desc")->paginate(5);
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

        //Validating Rules for a new comment
        $comment_rules = [
            'comment' => 'required|max:10000',
        ];
        //Custom Validation Error-Messages
        $response_validation_msg = [
            'comment.max' => 'Text ist zu lang',
            'comment.required' => 'Bitte Text eingeben!',
        ];

        $validator = Validator::make($request->all(), $comment_rules, $response_validation_msg );

        if ($validator->fails()) {
            $message = $validator->errors();

            return redirect()->back()
                ->withErrors($message)
                ->withInput();
        }

        $comment = $request -> input("comment");

        $news_comment = Newscomment::create(
            [   "comment" => $comment,
                "user_id" => Auth::user()->id,
                "news_id" => $news_id,
            ]);

        return redirect()->back()->with('success', 'comment created');

    }

}
