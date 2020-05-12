<?php

namespace App\Http\Controllers\nadestack;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;




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
        //TODO
        return view("news_example")->with("news_metadata", $news_metadata);
    }

}
