@extends('templates.default_template')

@section('content')

{{--
{{$match_data}}
{{$map_data}}
{{$matchposts}}

--}}
@foreach ($match_data as $match)
<div class="container-fluid" style="background-color: #0F0F0F;color:white">
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col-xl-6 offset-xl-0 text-center" style="padding-top: 60px;">
            <h2 class="text-center">Season X - Matchday Y</h2>
            <div class="table-responsive table-borderless text-white" id="match_result_table">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="text-center"><img src="{{URL::asset('assets/img/teamlogos/')}}/{{$match->TEAM_1_LOGO}}" style="width: 150px;"></td>
                            <td class="text-center text-white d-xl-flex justify-content-xl-center" style="font-size: 40px;padding: 12px;padding-top: 50px;">2:0</td>
                            <td class="text-center"><img src="{{URL::asset('assets/img/teamlogos/')}}/{{$match->TEAM_2_LOGO}}" style="width: 150px;height: 150px;"></td>
                        </tr>
                        <tr>
                            <td class="text-center text-white">BIG</td>
                            <td class="text-center" style="color: rgb(255,255,255);">Status: closed</td>
                            <td class="text-center text-white">NAVI</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <form>
                <div class="form-row" style="padding-bottom: 15px;">
                    <div class="col-xl-3 d-xl-flex justify-content-xl-center align-items-xl-center"><label class="col-form-label text-center d-xl-flex justify-content-xl-center align-items-xl-center">Date proposal 1:</label></div>
                    <div class="col-xl-5 d-xl-flex justify-content-xl-center align-items-xl-center"><input class="form-control" type="datetime-local"></div>
                    <div class="col-xl-4 text-center d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 16px;"><button class="btn btn-success d-xl-flex justify-content-xl-center align-items-xl-center" type="button" style="font-size: 15px;padding-left: 0px;margin-left: 0px;"><i class="fa fa-check" style="padding-left: 10px;"></i><span>&nbsp;Accept</span></button>
                        <span
                            style="padding-left: 10px;"></span><button class="btn btn-danger d-xl-flex justify-content-xl-center align-items-xl-center" type="button" style="font-size: 15px;padding-left: 0px;"><i class="fa fa-remove" style="padding-left: 10px;"></i><span>&nbsp;Decline</span></button></div>
                </div>
                <div class="form-row" style="padding-bottom: 15px;">
                    <div class="col-xl-3 d-xl-flex justify-content-xl-center align-items-xl-center"><label class="col-form-label text-center d-xl-flex justify-content-xl-center align-items-xl-center">Date proposal 2:</label></div>
                    <div class="col-xl-5 d-xl-flex justify-content-xl-center align-items-xl-center"><input class="form-control" type="datetime-local"></div>
                    <div class="col-xl-4 text-center d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 16px;"><button class="btn btn-success d-xl-flex justify-content-xl-center align-items-xl-center" type="button" style="font-size: 15px;padding-left: 0px;margin-left: 0px;"><i class="fa fa-check" style="padding-left: 10px;"></i><span>&nbsp;Accept</span></button>
                        <span
                            style="padding-left: 10px;"></span><button class="btn btn-danger d-xl-flex justify-content-xl-center align-items-xl-center" type="button" style="font-size: 15px;padding-left: 0px;"><i class="fa fa-remove" style="padding-left: 10px;"></i><span>&nbsp;Decline</span></button></div>
                </div>
                <div class="form-row" style="padding-bottom: 15px;">
                    <div class="col-xl-3 d-xl-flex justify-content-xl-center align-items-xl-center"><label class="col-form-label text-center d-xl-flex justify-content-xl-center align-items-xl-center">Date proposal 3:</label></div>
                    <div class="col-xl-5 d-xl-flex justify-content-xl-center align-items-xl-center"><input class="form-control" type="datetime-local"></div>
                    <div class="col-xl-4 text-center d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 16px;"><button class="btn btn-success d-xl-flex justify-content-xl-center align-items-xl-center" type="button" style="font-size: 15px;padding-left: 0px;margin-left: 0px;"><i class="fa fa-check" style="padding-left: 10px;"></i><span>&nbsp;Accept</span></button>
                        <span
                            style="padding-left: 10px;"></span><button class="btn btn-danger d-xl-flex justify-content-xl-center align-items-xl-center" type="button" style="font-size: 15px;padding-left: 0px;"><i class="fa fa-remove" style="padding-left: 10px;"></i><span>&nbsp;Decline</span></button></div>
                </div>
            </form>
        </div>
        <div class="col-xl-3"></div>
    </div>
    <!--Match/statsview with Downloadoption-->
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col-xl-6 colum_content_big">
            <h2 class="nadestack_heading_two">Matchstats</h2>
            <!--Nav-Tab mit JS See: https://getbootstrap.com/docs/4.0/components/navs/#javascript-behavior-->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="all-stats-tab" data-toggle="tab" href="#all-stats" role="tab" aria-controls="all-stats" aria-selected="true">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="map1-stats-tab" data-toggle="tab" href="#map1-stats" role="tab" aria-controls="map1-stats" aria-selected="false">Map 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="map2-stats-tab" data-toggle="tab" href="#map2-stats" role="tab" aria-controls="map2-stats" aria-selected="false">Map 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="map3-stats-tab" data-toggle="tab" href="#map3-stats" role="tab" aria-controls="map2-stats" aria-selected="false">Map 3</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <!--Tab-->
                <div class="tab-pane fade show active" id="all-stats" role="tabpanel" aria-labelledby="all-stats-tab">
                    <div class="matchstats">
                        <div class="row" style="justify-content: center;">
                            <h3 class="nadestack_heading_three">BIG</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table nadestack-tbl">
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>Name</td>
                                    <td>Kills</td>
                                    <td>Deaths</td>
                                    <td>Assists</td>
                                    <td>K/D</td>
                                    <td>ADR</td>
                                    <td>Rating 2.0</td>
                                    <td>HS%</td>
                                    <td>3K</td>
                                    <td>4K</td>
                                    <td>5K</td>
                                    <td>EF</td>
                                    <td>GD</td>
                                </tr>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>Hoch die Tabsen</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>Tiziaaaannn</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>Syrson</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>K1to</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>XANTARES</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row" style="justify-content: center;">
                            <h3 class="nadestack_heading_three">NAVI</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table nadestack-tbl">
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>Name</td>
                                    <td>Kills</td>
                                    <td>Deaths</td>
                                    <td>Assists</td>
                                    <td>K/D</td>
                                    <td>ADR</td>
                                    <td>Rating 2.0</td>
                                    <td>HS%</td>
                                    <td>3K</td>
                                    <td>4K</td>
                                    <td>5K</td>
                                    <td>EF</td>
                                    <td>GD</td>
                                </tr>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Simple GOD</td>
                                    <td>120</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Electonic</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Flamie</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Boombl4</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Perfecto</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-center nadestack_heading_three">
                            <button class="nadestack_btn" style="font-size: 25px;">Download Demo</button>
                        </div>
                    </div>
                </div>
                <!--Tab-->
                <div class="tab-pane fade" id="map1-stats" role="tabpanel" aria-labelledby="map1-stats-tab">
                    <div class="matchstats">
                        <div class="row" style="justify-content: center;">
                            <h3 class="nadestack_heading_three">BIG</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table nadestack-tbl">
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>Name</td>
                                    <td>Kills</td>
                                    <td>Deaths</td>
                                    <td>Assists</td>
                                    <td>K/D</td>
                                    <td>ADR</td>
                                    <td>Rating 2.0</td>
                                    <td>HS%</td>
                                    <td>3K</td>
                                    <td>4K</td>
                                    <td>5K</td>
                                    <td>EF</td>
                                    <td>GD</td>
                                </tr>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>Hoch die Tabsen</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>Tiziaaaannn</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>Syrson</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>K1to</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>XANTARES</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row" style="justify-content: center;">
                            <h3 class="nadestack_heading_three">NAVI</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table nadestack-tbl">
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>Name</td>
                                    <td>Kills</td>
                                    <td>Deaths</td>
                                    <td>Assists</td>
                                    <td>K/D</td>
                                    <td>ADR</td>
                                    <td>Rating 2.0</td>
                                    <td>HS%</td>
                                    <td>3K</td>
                                    <td>4K</td>
                                    <td>5K</td>
                                    <td>EF</td>
                                    <td>GD</td>
                                </tr>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Simple GOD</td>
                                    <td>120</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Electonic</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Flamie</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Boombl4</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Perfecto</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-center nadestack_heading_three">
                            <button class="nadestack_btn" style="font-size: 25px;">Download Demo</button>
                        </div>
                    </div>
                </div>
                <!--Tab-->
                <div class="tab-pane fade" id="map2-stats" role="tabpanel" aria-labelledby="map2-stats-tab">
                    <div class="matchstats">
                        <div class="row" style="justify-content: center;">
                            <h3 class="nadestack_heading_three">BIG</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table nadestack-tbl">
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>Name</td>
                                    <td>Kills</td>
                                    <td>Deaths</td>
                                    <td>Assists</td>
                                    <td>K/D</td>
                                    <td>ADR</td>
                                    <td>Rating 2.0</td>
                                    <td>HS%</td>
                                    <td>3K</td>
                                    <td>4K</td>
                                    <td>5K</td>
                                    <td>EF</td>
                                    <td>GD</td>
                                </tr>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>Hoch die Tabsen</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>Tiziaaaannn</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>Syrson</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>K1to</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>XANTARES</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row" style="justify-content: center;">
                            <h3 class="nadestack_heading_three">NAVI</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table nadestack-tbl">
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>Name</td>
                                    <td>Kills</td>
                                    <td>Deaths</td>
                                    <td>Assists</td>
                                    <td>K/D</td>
                                    <td>ADR</td>
                                    <td>Rating 2.0</td>
                                    <td>HS%</td>
                                    <td>3K</td>
                                    <td>4K</td>
                                    <td>5K</td>
                                    <td>EF</td>
                                    <td>GD</td>
                                </tr>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Simple GOD</td>
                                    <td>120</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Electonic</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Flamie</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Boombl4</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Perfecto</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-center nadestack_heading_three">
                            <button class="nadestack_btn" style="font-size: 25px;">Download Demo</button>
                        </div>
                    </div>
                </div>
                <!--Tab-->
                <div class="tab-pane fade" id="map3-stats" role="tabpanel" aria-labelledby="map3-stats-tab">
                    <div class="matchstats">
                        <div class="row" style="justify-content: center;">
                            <h3 class="nadestack_heading_three">BIG</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table nadestack-tbl">
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>Name</td>
                                    <td>Kills</td>
                                    <td>Deaths</td>
                                    <td>Assists</td>
                                    <td>K/D</td>
                                    <td>ADR</td>
                                    <td>Rating 2.0</td>
                                    <td>HS%</td>
                                    <td>3K</td>
                                    <td>4K</td>
                                    <td>5K</td>
                                    <td>EF</td>
                                    <td>GD</td>
                                </tr>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>Hoch die Tabsen</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>Tiziaaaannn</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>Syrson</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>K1to</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/big.png"></a>
                                    </td>
                                    <td>XANTARES</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row" style="justify-content: center;">
                            <h3 class="nadestack_heading_three">NAVI</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table nadestack-tbl">
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>Name</td>
                                    <td>Kills</td>
                                    <td>Deaths</td>
                                    <td>Assists</td>
                                    <td>K/D</td>
                                    <td>ADR</td>
                                    <td>Rating 2.0</td>
                                    <td>HS%</td>
                                    <td>3K</td>
                                    <td>4K</td>
                                    <td>5K</td>
                                    <td>EF</td>
                                    <td>GD</td>
                                </tr>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Simple GOD</td>
                                    <td>120</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Electonic</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Flamie</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Boombl4</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href=""><img class="rounded-circle player-pic-match" src="assets/img/teamlogos/navi.jpg"></a>
                                    </td>
                                    <td>Perfecto</td>
                                    <td>30</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>6.0</td>
                                    <td>95</td>
                                    <td>1.8</td>
                                    <td>58</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>9</td>
                                    <td>120</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-center nadestack_heading_three">
                            <button class="nadestack_btn" style="font-size: 25px;">Download Demo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col-xl-6 offset-xl-0 text-center">
            <div class="row">
                <div class="col">

                    <h3>Mapvote</h3>

                    {{--Defining when to display the Mapvote--}}
                    @if($match->team_1_ready == 1 && $match->team_2_ready == 0 || $match->team_2_ready == 1 && $match->team_1_ready == 0 || $match->team_1_ready == 0 && $match->team_2_ready == 0)

                    <script>
                        $('document').ready(function (e) {

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            getTeamReadyStatus();

                            function getTeamReadyStatus() {



                                $.ajax({
                                    url: "{{route('teamreadystatus')}}",
                                    type: "POST",
                                    beforeSend: function (xhr) {
                                        var token = $('meta[name="csrf-token"]').attr('content');
                                        if (token) {
                                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                                        }

                                    },
                                    data: {match_id: "{{$match->match_id}}"},
                                    dataType: 'json',
                                    success: function (data) {



                                        //var obj = JSON.parse(data);

                                        if (data.TEAM_1_READY == 0 && data.TEAM_2_READY == 0) {

                                            $('#mapvote_userinformation').html("");
                                            $('#mapvote_userinformation').append("Status: " + " Closed");

                                        }


                                        if (data.TEAM_1_READY && data.TEAM_2_READY) {

                                            console.log("Beide Ready")


                                            location.reload();
                                        } else if (data.TEAM_1_READY || data.TEAM_2_READY) {


                                            if (data.TEAM_1_READY) {

                                                $('#mapvote_userinformation').html("");
                                                $('#mapvote_userinformation').append("Status: " + data.TEAM_2_NAME + " has " + data.TEAM_2_VOTETIME_LEFT + " Seconds left to vote");

                                            }

                                            if (data.TEAM_2_READY) {


                                                $('#mapvote_userinformation').html("");
                                                $('#mapvote_userinformation').append("Status: " + data.TEAM_1_NAME + " has  " + data.TEAM_1_VOTETIME_LEFT + " Seconds left to vote");
                                            }


                                            setTimeout(function (e) {

                                                getTeamReadyStatus();

                                            }, 1000);

                                        } else {

                                            setTimeout(function (e) {

                                                getTeamReadyStatus();

                                            }, 1000);


                                        }



                                        /*   if (data) {

                                         console.log(data);
                                         $('#mapvote_userinformation').html("");
                                         $('#mapvote_userinformation').append("Status: " + data + " has to vote");


                                         setTimeout(function (e) {

                                         getTeamReadyStatus();

                                         }, 1000);

                                         } else {


                                         setTimeout(function (e) {

                                         getTeamReadyStatus();

                                         }, 1000);
                                         console.log(data);
                                         //  location.reload();



                                         }*/

                                    }, error: function (e) {

                                        console.log(e);



                                    }
                                });

                            }

                        });



                    </script>

                    @endif


                    @if($match->team_1_ready == 1 && $match->team_2_ready == 1 && $match->decider_map == NULL)
                    <div class="table-responsive nadestack_table">
                        <table  id="map_table" class="table">
                            <thead>
                                <tr>
                                    @foreach ($map_data as $map)
                                    <th>{{$map['mapname']}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($map_data as $map)
                                    @if ($map['taken'] == False)
                                    <td id="td_{{$loop->index}}" name="{{$map['mapname']}}"><img class="grow" src="{{URL::asset('assets/img/maps')}}/{{$map['imageurl']}}" style="width: 80px;height: 60px;"></td>
                                    @elseif ($map['taken'] == True)
                                    <td class="unselectable" id="td_{{$loop->index}}"><img class="" src="{{URL::asset('assets/img/maps')}}/{{$map['imageurl']}}" style="width: 80px;height: 60px;"></td>
                                    @endif
                                    @endforeach

                                </tr>
                            </tbody>
                        </table>
                    </div>


                    {{--This Script is part of the Vote process--}}

                    <script>

                        $('document').ready(function (evt) {

                            var map_secs_refresh = false;


                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });


                            checkVoteTime();


                            function checkVoteTime() {

                                $.ajax({
                                    url: "{{route('votetime')}}",
                                    type: "POST",
                                    beforeSend: function (xhr) {
                                        var token = $('meta[name="csrf-token"]').attr('content');
                                        if (token) {
                                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                                        }


                                    },
                                    data: {match_id: "{{$match->match_id}}"},
                                    dataType: 'json',
                                    success: function (data) {

                                        if (!data) {

                                            location.reload();

                                        } else {

                                            console.log(data);

                                            $('#mapvote_userinformation').html("");

                                            if (data == 30 || data == 29 && map_secs_refresh == false) {

                                                console.log("REFRESH AUF TRUE SETZEN");


                                                map_secs_refresh = true;
                                            }



                                            $('#mapvote_userinformation').append(data + " Seconds left to Vote");

                                            setTimeout(function (e) {

                                                checkVoteTime();

                                            }, 1000);
                                        }

                                    }, error: function (e) {

                                        console.log(e);


                                        setTimeout(function (e) {

                                            checkVoteTime();

                                        }, 1000);



                                    }
                                });


                            }

                            var selected_map = null;
                            var hasToVote = false;


                            loadMapStatus();


                            $('#map_table > tbody > tr > td').on('click', function (e) {


                                $('#map_table > tbody tr > td').each(function (evt) {




                                    if (!$(this).hasClass("unselectable")) {


                                        $(this).removeClass("selected_map");
                                    }

                                });


                                if (!$(this).hasClass("unselectable")) {

                                    console.log("hio");

                                    selected_map = $(this).attr("name");
                                    $(this).addClass("selected_map");


                                }






                            });


                            $('#mapselect_btn').on('click', function (evt) {





                                if (hasToVote) {

                                    banMap();
                                }





                            });








                            function loadMapStatus() {

                                $.ajax({
                                    url: "{{route('mapvotestatus')}}",
                                    type: "POST",
                                    beforeSend: function (xhr) {
                                        var token = $('meta[name="csrf-token"]').attr('content');
                                        if (token) {
                                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                                        }


                                    },
                                    data: {match_id: "{{$match->match_id}}"},
                                    dataType: 'json',
                                    success: function (data) {

                                        console.log(data);


                                        if (data) {

                                            if (map_secs_refresh) {


                                                location.reload();
                                            }


                                            //location.reload();
                                            hasToVote = true;

                                            $('#mapselect_btn').prop('disabled', false);


                                        } else {
                                            hasToVote = false;
                                            console.log("Dieser USER / TEAM IST GERADE NICHT AM  VOTEN");
                                            $('#mapselect_btn').prop('disabled', true);

                                            setTimeout(function (e) {


                                                loadMapStatus();

                                            }, 1000);
                                        }

                                    }, error: function (e) {

                                        console.log(e);

                                        setTimeout(function (e) {


                                            loadMapStatus();

                                        }, 1000);





                                    }
                                });


                                //DEBUG
                                $.ajax({
                                    url: "{{route('mapvotestatus')}}",
                                    type: "POST",
                                    beforeSend: function (xhr) {
                                        var token = $('meta[name="csrf-token"]').attr('content');
                                        if (token) {
                                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                                        }


                                    },
                                    data: {match_id: "{{$match->match_id}}"},
                                    dataType: 'text',
                                    success: function (data) {

                                        console.log("TEXTUELLER DEBUG:"+data);


                                    }

                                }
                                );







                            }


                            function banMap() {

                                console.log("BAN");

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    url: "{{route('mapvote')}}",
                                    type: "POST",
                                    beforeSend: function (xhr) {
                                        var token = $('meta[name="csrf-token"]').attr('content');
                                        if (token) {
                                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                                        }


                                    },
                                    data: {match_id: "{{$match->match_id}}", map: selected_map},
                                    dataType: 'json',
                                    success: function (data) {




                                        if (data) {

                                            location.reload();

                                        } else {

                                            loadMapStatus();
                                        }

                                    }, error: function (e) {

                                        console.log(e);
                                        loadMapStatus();

                                    }
                                });

                            }


                        });
                    </script>



                    @if(Auth::check())

                    @if( Auth::user()->team_id == $match->TEAM_1_ID || Auth::user()->team_id == $match->TEAM_2_ID)

                    {{--If the Ban of Team 2 is made we gonna enable --}}
                    <button class="btn nadestack_btn" id="mapselect_btn" type="button">Ban selected Map</button>
                    @endif




                    @endif

                    @endif

                    @if(Auth::check())


                    {{--Checking if Mapvote is over in order to display the IP--}}


                   @if($match->decider_map != NULL && Auth::check() && Auth::user()->team_id == $match->TEAM_1_ID || $match->decider_map != NULL && Auth::user()->team_id == $match->TEAM_2_ID)

                   <button>connect to Server</button>
                   @endif
                    {{--Checking if both Teams are ready, e.g started the Mapvote--}}
                    @if($match->team_1_ready == 0 && Auth::user()->team_id == $match->TEAM_1_ID || $match->team_2_ready == 0 && Auth::user()->team_id == $match->TEAM_2_ID)

                    {{--Checking if User on the Site is related to both Teams in order to start the Mapvote--}}
                    @if(Auth::check() && Auth::user()->team_id == $match->TEAM_1_ID || Auth::user()->team_id == $match->TEAM_2_ID)

                    <form action="{{route('start_mapvote')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$match_id}}" name="matchid">
                        <button class="btn nadestack_btn" type="submit">Start Mapvote</button>
                    </form>
                    @endif

                    @endif


                    @endif

                    {{--Printing out the current Status of the Vetoprocess for Guest, non related Users and related Teamusers--}}

                    @if (session('mapvote_status'))
                    <h6  id="mapvote_userinformation"style="margin-bottom: 10px;margin-top: 10px;">Status: {{session('mapvote_status')}}</h6>
                    @else
                    <h6  id="mapvote_userinformation"style="margin-bottom: 10px;margin-top: 10px;">Status: </h6>
                    @endif


                    <!-- <button class="btn nadestack_btn" id="remove_map_btn" type="button">Start Mapvote</button>
                     <button class="btn nadestack_btn" id="remove_map_btn" type="button">remove selected Map</button>-->
                </div>
            </div>
        </div>
        <div class="col-xl-3"></div>
    </div>
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col-xl-6">
            <div>
                <div class="card" style="background-color: #333138;margin-bottom: 25px;">
                    <div class="card-header">
                        <h5 class="text-center mb-0">Comment Section</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <ul class="col-md-12" style="list-style: none;">

                                {{--Loop through all Matchposts--}}

                              @php

                              $comment_index  = $page+1;
                              @endphp
                                @foreach($matchposts as $matchpost)
                                <li  id="matchpost_{{$comment_index}}"style="margin-bottom: 50px;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-borderless comment_header" >
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left">#{{$comment_index}}</td>
                                                        <td class="text-right">{{$matchpost->created_at}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 text-center">
                                            <h3>{{$matchpost->username}}</h3><img src="{{URL::asset('assets/img/profile_pictures')}}/{{$matchpost->avatar_url}}" width="80px" height="80" />
                                        </div>
                                        <div  style="background-color:#0F0F0F;"class="col-md-6">
                                            <p>{{$matchpost->comment}}</p>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                </li>

                                @php
                                $comment_index++;
                                @endphp
                                @endforeach
                            </ul>
                        </div>


                        <h4 class="text-center">Add Comment</h4>

                        <form class="text-center" action="{{route('newmatchcomment')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$match_id}}" name="matchid">
                            <div class="form-row">
                                <div class="col"><textarea class="form-control" name="comment"></textarea></div>
                            </div>
                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class='alert alert-danger'>{{$error}}</div>
                            @endforeach
                            @endif
                            <div class="form-row">
                                <div class="col"><button class="btn btn-primary nadestack_btn" id="comment_submit_btn" type="submit">Submit Comment</button></div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>
@endforeach
@endsection
