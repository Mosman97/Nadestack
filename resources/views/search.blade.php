@extends('templates.default_template')

@section('content')


{{var_dump($search_results)}}
<div class="container-fluid nadestack_body">
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col colum_content_big">
            <h1 class="text-center nadestack_heading_one">Results for AlexRr</h1>
            <div class="filter">
                <form action="{{route('search')}}" method="GET">
                    <input  name="query"placeholder="e.g S1mple, Astralis, ...">
                    <select name="filter">
                        <option value="0">All</option>      
                        @foreach($search_categories as $search_category )         
                        <option value="{{$search_category['search_ranking']}}">{{$search_category['search_category_text']}}</option>
                        @endforeach

                    </select>
                    <button type="submit">Search</button>
                </form>
            </div>
            <hr class="bg-light">



            @if($search_results != NULL)



            @foreach($search_result_categories as $search_category )


            <h1 class='text-center'>{{$search_category['search_category_text']}}</h1>
            @if($search_category['search_ranking'] == 1)

            @foreach($user_results as $user)

            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col">
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col border">
                            <div class="row" style="margin-top: 5px">
                                <div class="col">
                                    <h3><a style="color: #FF312E;" href="{{route('profilepage',$user['username'])}}">{{$user['username']}}</a></h3>
                                </div>
                                <div class="col-xl-3"><label class="col-form-label">02-10-1997</label></div>
                            </div>
                            <div class="row">
                                <div class="col"><label style="font-size: 11px;">Player</label><label>Hier würde der der Anfang einer News, Teambeschreibung, Prfilbeschreibung, Kommentaranfang oder Match stehen.<br></label></div>
                            </div>
                        </div>
                        <div class="col-xl-2"></div>
                    </div>
                </div>
            </div>

            @endforeach


            @elseif($search_category['search_ranking'] == 2)

            @foreach($team_results as $team)

            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col">
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col border">
                            <div class="row" style="margin-top: 5px">
                                <div class="col">
                                    <h3><a style="color: #FF312E;" href="{{route('teampage',$team['team_id'])}}">{{$team['team_name']}}</a></h3>
                                </div>
                                <div class="col-xl-3"><label class="col-form-label">02-10-1997</label></div>
                            </div>
                            <div class="row">
                                <div class="col"><label style="font-size: 11px;">{{$search_category['search_category_text']}}</label><label>Hier würde der der Anfang einer News, Teambeschreibung, Prfilbeschreibung, Kommentaranfang oder Match stehen.<br></label></div>
                            </div>
                        </div>
                        <div class="col-xl-2"></div>
                    </div>
                </div>
            </div>
            @endforeach



            @elseif($search_category['search_ranking'] == 3)

            @foreach($news_results as $news)

            <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                <div class="col">
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col border">
                            <div class="row" style="margin-top: 5px">
                                <div class="col">
                                    <h3><a style="color: #FF312E;" href="{{route('viewnews',$news['news_id'])}}">{{$news['news_title']}}</a></h3>
                                </div>
                                <div class="col-xl-3"><label class="col-form-label">02-10-1997</label></div>
                            </div>
                            <div class="row">
                                <div class="col"><label style="font-size: 11px;">{{$search_category['search_category_text']}}</label><label>Hier würde der der Anfang einer News, Teambeschreibung, Prfilbeschreibung, Kommentaranfang oder Match stehen.<br></label></div>
                            </div>
                        </div>
                        <div class="col-xl-2"></div>
                    </div>
                </div>
            </div>
            @endforeach

            @endif




            @endforeach


            @endif




            <div class="row" style="margin-top: 20px;"><div id ="news_pagination" class="row mx-auto">
                    <div class="col-md-12 mx-auto text-center">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div></div>
        </div>
        <div class="col-xl-3"></div>
    </div>
</div>
@endsection
