<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\search_category;
use App\Team;
use App\User;
use App\News;

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
                                            ->with("search_result_categories", $search_result_categories);
                        case 2:
                            $team_results = Team::where("team_name", "LIKE", "%" . $request->input('query') . "%")->get();
                            return view('search')->with("search_results", TRUE)
                                            ->with("search_categories", $search_categories)
                                            ->with("team_results", $team_results)
                                            ->with("search_result_categories", $search_result_categories);

                        case 3:
                            $news_results = News::where("news_title", "LIKE", "%" . $request->input('query') . "%")->get();
                            return view('search')->with("search_results", TRUE)
                                            ->with("search_categories", $search_categories)
                                            ->with("news_results", $news_results)
                                            ->with("search_result_categories", $search_result_categories);


                        default: return view('search')->with("search_results", NULL)
                                            ->with("search_categories", $search_categories)
                                            ->with("error", "No Data found");
                    }
                }



                //No Searchfilter is applied we search every Db
                else {
                  
                    $user_results = User::where("username", "LIKE", "%" . $request->input('query') . "%")->get();

                    $team_results = Team::where("team_name", "LIKE", "%" . $request->input('query') . "%")->get();

                    $news_results = News::where("news_title", "LIKE", "%" . $request->input('query') . "%")->get();


                    return view("search")
                                    ->with("search_results", TRUE)
                                    ->with("search_categories", $search_categories)
                                    ->with("search_result_categories", $search_categories)
                                    ->with("user_results", $user_results)
                                    ->with("team_results", $team_results)
                                    ->with("news_results", $news_results);
                }
            } else {
                
            }
        } else {



            return view("search")
                            ->with("search_results", Null)
                            ->with("search_categories", $search_categories);
        }







        //  var_dump($request->input());
    }

}
