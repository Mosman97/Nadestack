<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\search_category;
use App\Team;
use App\User;
use App\News;
use App\forum_thread;
use App\forum_post;

class SearchController extends Controller {

    const FILTER_ALL = "all";
    const FILTER_PLAYER = "player";
    const FILTER_TEAM = "team";
    const FILTER_NEWS = "news";
    const FILTER_COMMENT = "comment";

    public function index(Request $request) {



        $user_searchresults = Null;
        $teams_searchresults = Null;
        $news_searchresults = Null;
        $query = $request->input('query');

        $search_categories = search_category::orderBy("search_ranking", "ASC")->get();



        //First we check if the URL is accessed via
        if ($request->has('query')) {



            if (strlen($request->input('query')) < 1) {


                return view("search")->with("error", "Msg")
                                ->with("search_results", NULL)
                                ->with("search_categories", $search_categories);
            }

            //Then we check if the Filter  Option is properly applied
            if ($request->has('filter')) {


                //If Filter is not set to all Categories
                if ((int) $request->input('filter') != 0) {

                    $search_result_categories = search_category::where('search_ranking', "=", $request->input('filter'))->get();


                    //Here we check which Filtertype applys to our Database Filters- The Default Case returns nothing
                    switch ((int) $request->input('filter')) {

                        case 1 :
                            $user_results = User::where("username", "LIKE", "%" . $request->input('query') . "%")->get();

                            return view('search')->with("search_results", TRUE)
                                            ->with("search_categories", $search_categories)
                                            ->with("user_results", $user_results)
                                            ->with("search_result_categories", $search_result_categories)
                                            ->with("query", $query);
                        case 2:
                            $team_results = Team::where("team_name", "LIKE", "%" . $request->input('query') . "%")->get();
                            return view('search')->with("search_results", TRUE)
                                            ->with("search_categories", $search_categories)
                                            ->with("team_results", $team_results)
                                            ->with("query", $query)
                                            ->with("search_result_categories", $search_result_categories);

                        case 3:
                            $news_results = News::where("news_title", "LIKE", "%" . $request->input('query') . "%")->get();
                            return view('search')->with("search_results", TRUE)
                                            ->with("search_categories", $search_categories)
                                            ->with("news_results", $news_results)
                                            ->with("query", $query)
                                            ->with("search_result_categories", $search_result_categories);


                        case 4:
                            $thread_results = forum_thread::where("forum_thread_title", "LIKE", "%" . $request->input('query') . "%")->get();
                            return view('search')->with("search_results", TRUE)
                                            ->with("search_categories", $search_categories)
                                            ->with("forumthread_results", $thread_results)
                                            ->with("query", $query)
                                            ->with("search_result_categories", $search_result_categories);

                        case 5:

                            $threadposts_results = forum_post::where("forum_post_content", "LIKE", "%" . $request->input('query') . "%")->get();
                            return view('search')->with("search_results", TRUE)
                                            ->with("search_categories", $search_categories)
                                            ->with("forumpost_results", $threadposts_results)
                                            ->with("query", $query)
                                            ->with("search_result_categories", $search_result_categories);

                        default: return view('search')->with("search_results", NULL)
                                            ->with("search_categories", $search_categories)
                                            ->with("query", $query)
                                            ->with("error", "No Data found");
                    }
                }



                //No Searchfilter is applied we search every Db
                else {

                    $user_results = User::where("username", "LIKE", "%" . $request->input('query') . "%")->get();

                    $team_results = Team::where("team_name", "LIKE", "%" . $request->input('query') . "%")->get();

                    $news_results = News::where("news_title", "LIKE", "%" . $request->input('query') . "%")->get();

                    $forumthread_results = forum_thread::where("forum_thread_title", "LIKE", "%" . $request->input('query') . "%")->get();

                    $forumposts_results = forum_post::where("forum_post_content", "LIKE", "%" . $request->input('query') . "%")->get();

                    return view("search")
                                    ->with("search_results", TRUE)
                                    ->with("search_categories", $search_categories)
                                    ->with("search_result_categories", $search_categories)
                                    ->with("user_results", $user_results)
                                    ->with("team_results", $team_results)
                                    ->with("news_results", $news_results)
                                    ->with("forumthread_results", $forumthread_results)
                                    ->with("forumpost_results", $forumposts_results)
                                    ->with("query", $query);
                }
            } else {

            }
        } else {



            return view("search")
                            ->with("search_results", Null)
                            ->with("query", $query)
                            ->with("search_categories", $search_categories);
        }







        //  var_dump($request->input());
    }

    public function autocomplete(Request $request)
    {
        $data = User::select("username")
            ->where("username","LIKE","%{$request->input('query')}%")
            ->get();

        return response()->json($data);
    }

}
