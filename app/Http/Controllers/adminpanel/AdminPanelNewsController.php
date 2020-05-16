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
        //Retrieving 10 News per Page Sorted by Date DESC
        $news = News::orderBy('created_at', "desc")->paginate(10);


        return view("adminpanel.menus.newsindex")
                        ->with("news", $news)
                        ->with("new_news_success", $request->input('new_news_sucess'))
                        ->with("news_delete_error", $request->input('news_delete_error'));
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




        //Defining if the Requested Ressoruce shoudl  be created or previewed


        if ($request->input('action') == "preview") {

            $news_metadata[0]['news_title'] = $request->input("news_heading");
            $news_metadata[0]['news_subheading'] = $request->input("news_subheading");
            $news_metadata[0]['news_content'] = $request->input("news-trixFields");
            $news_metadata[0]['news_author'] = Auth::user()->username;
            $news_metadata[0]['preview'] = 1;



            return view("news_example")->with("news_metadata", $news_metadata);
        } else if ($request->input('action') == "create") {

            //Getting News Heading
            $news_heading = $request->input("news_heading");


            //Getting News Subheading
            $news_subheading = $request->input("news_subheading");

            //Getting Rich Text News Content
            $news_content = $request->input("news-trixFields");

            //Creating a New News in the DB
            $new_post = News::create(
                            ['news_title' => $news_heading,
                                "news_subheading" => $news_subheading,
                                "news_author" => Auth::user()->username,
                                "news_content" => $news_content['content'],
            ]);

            //Redirect to Index with Success Msg
            return Redirect::route('adminpanel_newsindex')->with("new_news_success", "a new News was just published!");
        }

        /*  if($_POST["preview"]) {
          //get Metadata of the articel
          $news_metadata[0]['news_title'] = $request->input("news_heading");
          $news_metadata[0]['news_subheading'] = $request->input("news_subheading");
          $news_metadata[0]['news_content'] = $request->input("news-trixFields");
          $news_metadata[0]['news_author'] = Auth::user()->username;
          return view("news_example")->with("news_metadata", $news_metadata);
          }

          else if($_POST["create"]) {
          //Getting News Heading
          $news_heading = $request->input("news_heading");


          //Getting News Subheading
          $news_subheading = $request->input("news_subheading");

          //Getting Rich Text News Content
          $news_content = $request->input("news-trixFields");

          //Creating a New News in the DB
          $new_post = News::create(
          ['news_title' => $news_heading,
          "news_subheading" => $news_subheading,
          "news_author" => Auth::user()->username,
          "news_content" => $news_content['content'],
          ]);

          //Redirect to Index with Success Msg
          return Redirect::route('adminpanel_newsindex')->with("new_news_success", "a new News was just published!");
          } */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {

        //get Metadata of the articel
        $news_metadata[0]['news_title'] = $request->input("news_heading");
        $news_metadata[0]['news_subheading'] = $request->input("news_subheading");
        $news_metadata[0]['news_content'] = $request->input("news-trixFields");
        $news_metadata[0]['news_author'] = Auth::user()->username;
        return view("news_example")->with("news_metadata", $news_metadata);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $news = News::where("news_id", "=", $id)->count();


        if ($news == 1) {


            $news = News::where("news_id", "=", $id)->get();


            return view('adminpanel.menus.newscreate')->with("news_data", $news);
        }

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $news = News::where("news_id", "=", $id)->count();


        if ($news == 1) {

            //Getting Rich Text News Content
            $news_content = $request->input("news-trixFields");

            //Updating News
            $news = News::where("news_id", "=", $id)->update([
                'news_title' => $request->input("news_heading"),
                'news_subheading' => $request->input("news_subheading"),
                'news_content' => $news_content['content']
            ]);



            return back()->with("update_success", "News was succesfully edited!");
        }

        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     * Deletes a single selected News
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {


        $news = News::where("news_id", "=", $id)->count();


        if ($news == 1) {
            //Deleting News in  Database
            $news = News::where("news_id", "=", $id)->delete();
            //Flashing news Delete Msg to Session
            $request->session()->flash("news_delete", "News successfully removed from the Database!");

            return json_encode(true);
        }

//TODO Implent Erros Handling when Use deleting could be proceed

        return json_encode(false);
    }

    /**
     * Delets mutliple News
     * @param Request $request
     */
    public function mulidestroy(Request $request) {

    }

}
