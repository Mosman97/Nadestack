@extends('templates.default_template')

@section('content')
    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col colum_content_big">
                <h1 class="text-center nadestack_heading_one">Results for AlexRr</h1>
                <div class="filter">
                    <form style="padding-bottom: 10px;">
                        <input placeholder="e.g S1mple, Astralis, ...">
                        <select>
                            <option value="all">All</option>
                            <option value="player">Player</option>
                            <option value="team">Team</option>
                            <option value="news">News</option>
                            <option value="forumtopic">Forum</option>
                            <option value="comment">Comment</option>
                        </select>
                    </form>
                </div>
                <hr class="bg-light">
                <div class="row" style="padding-bottom: 10px; padding-top: 10px;">
                    <div class="col">
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col border">
                                <div class="row">
                                    <div class="col">
                                        <h3><a style="color: #FF312E;" href="https://twitter.com/alexrrcs">AlexRr</a></h3>
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
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col">
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col border">
                                <div class="row">
                                    <div class="col">
                                        <h3><a style="color: #FF312E;" href="https://twitter.com/alexrrcs">AlexRr</a></h3>
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
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col">
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col border">
                                <div class="row">
                                    <div class="col">
                                        <h3><a style="color: #FF312E;" href="https://twitter.com/alexrrcs">AlexRr</a></h3>
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
