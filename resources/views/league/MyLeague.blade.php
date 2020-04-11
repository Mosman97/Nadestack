@extends('templates.league_default_template')

@section('content')
    <div class="col-xl-6 colum_content_big">
        <h1 class="text-center nadestack_heading_one"><img id='nav_logo' src='{{URL::asset('assets/img/logo.png')}}' width="60px"/>Season 1<img id='nav_logo' src='{{URL::asset('assets/img/logo.png')}}' width="60px"/></h1>
        <hr class="bg-light"/>
        <h2 class="text-center nadestack_heading_two">Starter Division 22</h2>
        <div class="row">
            <div class="col text-center">
                <label class="col-form-label">Default day:&nbsp;</label>
                <label class="col-form-label">Saturday</label>
            </div>
        </div>
        <hr class="bg-light"/>
        <h3 class="text-left nadestack_heading_three">Most noticeable players:</h3>
        <ul class="text-center nadestack-list-ul">
            <li class="player-li-entry">
                <a href="" title="syn">
                    <div class="player-container-li"><img class="rounded-circle img-fluid figure-img" src="../assets/img/profile_pictures/syn.png" width="50px" height="50px"></div>
                    <span>Syn</span>
                </a>
                <div>
                    <span>Rating:&nbsp;</span>
                    <span>1.7</span>
                </div>
                <div class="player-container-btn"><button class="btn btn-primary nadestack_btn" type="button">View Player</button></div>
            </li>
            <li class="player-li-entry">
                <a href="" title="syn">
                    <div class="player-container-li"><img class="rounded-circle img-fluid figure-img" src="../assets/img/profile_pictures/syn.png" width="50px" height="50px"></div>
                    <span>Syn</span>
                </a>
                <div>
                    <span>ADR:&nbsp;</span>
                    <span>98</span>
                </div>
                <div class="player-container-btn"><button class="btn btn-primary nadestack_btn" type="button">View Player</button></div>
            </li>
            <li class="player-li-entry">
                <a href="" title="syn">
                    <div class="player-container-li"><img class="rounded-circle img-fluid figure-img" src="../assets/img/profile_pictures/syn.png" width="50px" height="50px"></div>
                    <span>Syn</span>
                </a>
                <div>
                    <span>KAST:&nbsp;</span>
                    <span>1.7</span>
                </div>
                <div class="player-container-btn"><button class="btn btn-primary nadestack_btn" type="button">View Player</button></div>
            </li>
            <li class="player-li-entry">
                <a href="" title="syn">
                    <div class="player-container-li"><img class="rounded-circle img-fluid figure-img" src="../assets/img/profile_pictures/syn.png" width="50px" height="50px"></div>
                    <span>Syn</span>
                </a>
                <div>
                    <span>Clutches:&nbsp;</span>
                    <span>17</span>
                </div>
                <div class="player-container-btn"><button class="btn btn-primary nadestack_btn" type="button">View Player</button></div>
            </li>
            <li class="player-li-entry">
                <a href="" title="syn">
                    <div class="player-container-li"><img class="rounded-circle img-fluid figure-img" src="../assets/img/profile_pictures/syn.png" width="50px" height="50px"></div>
                    <span>Syn</span>
                </a>
                <div>
                    <span>HS:&nbsp;</span>
                    <span>65%</span>
                </div>
                <div class="player-container-btn"><button class="btn btn-primary nadestack_btn" type="button">View Player</button></div>
            </li>
        </ul>

        <!-- End of new  -->
        <hr class="bg-light"/>
        <div class="row">
            <div class="col-md text-left">
                <h3 class="nadestack_heading_three">Next Matches:</h3>
            </div>
            <div class="col-md-8">
                <div class="table-responsive" >
                    <table class="table nadestack-tbl table-borderless table-sm">
                        <tbody>
                        <tr>
                            <td><a style="color: #FF312E" href="">Deckenglotzer vs Frechdachse</a></td>
                            <td>20.03.2020 - 19:00</td>
                        </tr>
                        <tr>
                            <td><a style="color: #FF312E" href="">Deckenglotzer vs Frechdachse</a></td>
                            <td>20.03.2020 - 19:00</td>
                        </tr>
                        <tr>
                            <td><a style="color: #FF312E" href="">Astralis vs BIG</a></td>
                            <td>20.03.2020 - 19:00</td>
                        </tr>
                        <tr>
                            <td><a style="color: #FF312E" href="">Astralis vs BIG</a></td>
                            <td>20.03.2020 - 19:00</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <hr class="bg-light"/>

        <h2 class="nadestack_heading_three font-weight-bold">Standings</h2>
        <div class="table-responsive">
            <table class="table nadestack-tbl" style="color: white;">
                <thead style="background-color: #1C2022;">
                <tr>
                    <th>#</th>
                    <th>Team</th>
                    <th>Wins</th>
                    <th>Loses</th>
                    <th>Maps</th>
                    <th>Rounds</th>
                    <th>Points</th>
                    <th>Destination</th>
                </tr>
                </thead>
                <tbody>
                <tr style="background-color: #113611">
                    <td>1</td>
                    <td><a href="">Deckengloter</a></td>
                    <td>2</td>
                    <td>0</td>
                    <td>4:2</td>
                    <td>100:23</td>
                    <td>6</td>
                    <td>Div 4</td>
                </tr>
                <tr style="background-color: #113611">
                    <td>1</td>
                    <td><a href="">Deckengloter</a></td>
                    <td>2</td>
                    <td>0</td>
                    <td>4:2</td>
                    <td>100:23</td>
                    <td>6</td>
                    <td>Div 4</td>
                </tr>
                <tr style="background-color: #4c4008">
                    <td>2</td>
                    <td><a href="">Frechdachse</a></td>
                    <td>2</td>
                    <td>0</td>
                    <td>4:2</td>
                    <td>100:23</td>
                    <td>6</td>
                    <td>Div 5</td>
                </tr>
                <tr style="background-color: #4c4008">
                    <td>3</td>
                    <td><a href="">BIG</a></td>
                    <td>0</td>
                    <td>2</td>
                    <td>2:4</td>
                    <td>23:100</td>
                    <td>0</td>
                    <td>Div 5</td>
                </tr>
                <tr style="background-color: #4c4008">
                    <td>2</td>
                    <td><a href="">Frechdachse</a></td>
                    <td>2</td>
                    <td>0</td>
                    <td>4:2</td>
                    <td>100:23</td>
                    <td>6</td>
                    <td>Div 5</td>
                </tr>
                <tr style="background-color: #4c4008">
                    <td>3</td>
                    <td><a href="">BIG</a></td>
                    <td>0</td>
                    <td>2</td>
                    <td>2:4</td>
                    <td>23:100</td>
                    <td>0</td>
                    <td>Div 5</td>
                </tr>
                <tr style="background-color: #4c2808">
                    <td>4</td>
                    <td><a href="">Astralis</a></td>
                    <td>0</td>
                    <td>2</td>
                    <td>2:4</td>
                    <td>23:100</td>
                    <td>0</td>
                    <td>Div 6</td>
                </tr>
                <tr style="background-color: #4c2808">
                    <td>4</td>
                    <td><a href="">Astralis</a></td>
                    <td>0</td>
                    <td>2</td>
                    <td>2:4</td>
                    <td>23:100</td>
                    <td>0</td>
                    <td>Div 6</td>
                </tr>
                </tbody>
            </table>
        </div>
        <hr class="bg-light"/>

        <h3 class="nadestack_heading_three text-left">All matches:</h3>
        <div>
            <h4 class="nadestack_heading_four">Week 1</h4>
            <div class="table-responsive">
                <table class="table nadestack-tbl table-sm table-borderless">
                    <tbody>
                    <tr style="background-color: #303436">
                        <td><a href="#">Deckenglotzer vs Frechdachse</a></td>
                        <td>20.03.2020 - 19:00</td>
                        <td>2:4</td>
                    </tr>
                    <tr>
                        <td><a href="#">Deckenglotzer vs Frechdachse</a></td>
                        <td>20.03.2020 - 19:00</td>
                        <td>2:4</td>
                    </tr>
                    <tr style="background-color: #303436">
                        <td><a href="">Astralis vs BIG</a></td>
                        <td>20.03.2020 - 19:00</td>
                        <td>2:4</td>
                    </tr>
                    <tr>
                        <td><a href="">Astralis vs BIG</a></td>
                        <td>20.03.2020 - 19:00</td>
                        <td>2:4</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <hr>
        </div>
        <div>
            <h4 class="nadestack_heading_four">Week 2</h4>
            <div class="table-responsive">
                <table class="table nadestack-tbl table-sm table-borderless">
                    <tbody>
                    <tr style="background-color: #303436">
                        <td><a href="#">Deckenglotzer vs Frechdachse</a></td>
                        <td>20.03.2020 - 19:00</td>
                        <td>-:-</td>
                    </tr>
                    <tr>
                        <td><a href="#">Deckenglotzer vs Frechdachse</a></td>
                        <td>20.03.2020 - 19:00</td>
                        <td>-:-</td>
                    </tr>
                    <tr style="background-color: #303436">
                        <td><a href="">Astralis vs BIG</a></td>
                        <td>20.03.2020 - 19:00</td>
                        <td>-:-</td>
                    </tr>
                    <tr>
                        <td><a href="">Astralis vs BIG</a></td>
                        <td>20.03.2020 - 19:00</td>
                        <td>-:-</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <hr>
        </div>
    <!--<div class="col-xl-3"></div>-->
</div>


@endsection
