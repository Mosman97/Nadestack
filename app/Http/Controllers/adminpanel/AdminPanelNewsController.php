<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminPanelNewsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //Retrieving 10 News per Page 
        $news = News::paginate(10);


        return view("adminpanel.menus.newsindex")->with("news", $news)->with("new_news_success", $request->input('new_news_sucess'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {




        return view("adminpanel.menus.newscreate");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {


        //Getting News Heading
        $news_heading = $request->input("news_heading");

        //Getting Rich Text News Content
        $news_content = $request->input("news-trixFields");

        //Creating a New News in the DB
        $new_post = News::create(['news_title' => $news_heading, "news_author" => Auth::user()->username, "news_content" => $news_content['content']]);

        //Redirect to Index with Success Msg
        return Redirect::route('adminpanel_newsindex')->with("new_news_success", "a new News was just published!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
