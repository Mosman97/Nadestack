@extends('templates.default_template')

@section('content')
    <div class="container-fluid" style="/*background-color: #333138;*//*margin-top: 50px;*/">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6" style="margin-top: 50px;margin-bottom: 50px;background-color: #333138;">
                <h1 class="text-center" style="padding-top: 10px;padding-bottom: 5px;">Starter Division 22</h1>
                <h2 class="text-center" style="padding-bottom: 5px;">Season 1</h2>
                <div class="row">
                    <div class="col text-center">
                        <label class="col-form-label">Default day:&nbsp;</label>
                        <label class="col-form-label">Saturday</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4"><label class="col-form-label">Default day:&nbsp;</label></div>
                    <div class="col-xl-8"><label class="col-form-label">Saturday</label></div>
                </div>

                <h3 class="text-left nadestack_heading_three">Most noticeable players:</h3>

                <ul class="text-center nadestack-list-ul-test">
                    <li class="player-li-entry">
                        <a href="" title="syn">
                            <div class="player-container-li"><img class="rounded-circle img-fluid figure-img" src="assets/img/profile_pictures/syn.png" width="50px" height="50px"></div>
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
                            <div class="player-container-li"><img class="rounded-circle img-fluid figure-img" src="assets/img/profile_pictures/syn.png" width="50px" height="50px"></div>
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
                            <div class="player-container-li"><img class="rounded-circle img-fluid figure-img" src="assets/img/profile_pictures/syn.png" width="50px" height="50px"></div>
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
                            <div class="player-container-li"><img class="rounded-circle img-fluid figure-img" src="assets/img/profile_pictures/syn.png" width="50px" height="50px"></div>
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
                            <div class="player-container-li"><img class="rounded-circle img-fluid figure-img" src="assets/img/profile_pictures/syn.png" width="50px" height="50px"></div>
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
                <h3 style="padding-bottom: 10px;">Next Matches:</h3>
                <div class="table-responsive">
                    <table class="table nadestack-tbl">
                        <thead>
                        <tr>
                            <th>Match</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><a href="">Deckenglotzer vs Frechdachse</a></td>
                            <td>20.03.2020 - 19:00</td>
                        </tr>
                        <tr>
                            <td><a href="">Deckenglotzer vs Frechdachse</a></td>
                            <td>20.03.2020 - 19:00</td>
                        </tr>
                        <tr>
                            <td><a href="">Astralis vs BIG</a></td>
                            <td>20.03.2020 - 19:00<br></td>
                        </tr>
                        <tr>
                            <td><a href="">Astralis vs BIG</a></td>
                            <td>20.03.2020 - 19:00<br></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <h3 style="padding-top: 10px;padding-bottom: 10px;">Standings:</h3>
                <div class="table-responsive">
                    <table class="table nadestack-tbl">
                        <thead style="background-color: #BA2422; color: white;">
                        <tr>
                            <th>#</th>
                            <th>Team</th>
                            <th>Wins</th>
                            <th>Loses</th>
                            <th>Maps</th>
                            <th>Rounds</th>
                            <th>Points</th>
                        </tr>
                        </thead>
                        <tbody style="background-color: #2A292E;">
                        <tr>
                            <td>1</td>
                            <td><a href="">Deckengloter</a></td>
                            <td>2</td>
                            <td>0</td>
                            <td>4:2</td>
                            <td>100:23</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><a href="">Frechdachse</a></td>
                            <td>2</td>
                            <td>0</td>
                            <td>4:2</td>
                            <td>100:23</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><a href="">BIG</a></td>
                            <td>0</td>
                            <td>2</td>
                            <td>2:4</td>
                            <td>23:100</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><a href="">Astralis</a></td>
                            <td>0</td>
                            <td>2</td>
                            <td>2:4</td>
                            <td>23:100</td>
                            <td>0</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <h3 style="padding-bottom: 5px;">All matches:</h3>
                <div>
                    <h4 class="text-center">Week 1</h4>
                    <div class="table-responsive">
                        <table class="table nadestack-tbl">
                            <thead>
                            <tr>
                                <th>Match</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="#">Deckenglotzer vs Frechdachse</a></td>
                                <td>20.03.2020 - 19:00</td>
                            </tr>
                            <tr>
                                <td><a href="#">Deckenglotzer vs Frechdachse</a></td>
                                <td>20.03.2020 - 19:00</td>
                            </tr>
                            <tr>
                                <td><a href="">Astralis vs BIG</a></td>
                                <td>20.03.2020 - 19:00<br></td>
                            </tr>
                            <tr>
                                <td><a href="">Astralis vs BIG</a></td>
                                <td>20.03.2020 - 19:00<br></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                </div>
                <div>
                    <h4 class="text-center">Week 2</h4>
                    <div class="table-responsive">
                        <table class="table nadestack-tbl ">
                            <thead>
                            <tr>
                                <th>Match</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="#">Deckenglotzer vs Frechdachse</a></td>
                                <td>20.03.2020 - 19:00</td>
                            </tr>
                            <tr>
                                <td><a href="#">Deckenglotzer vs Frechdachse</a></td>
                                <td>20.03.2020 - 19:00</td>
                            </tr>
                            <tr>
                                <td><a href="">Astralis vs BIG</a></td>
                                <td>20.03.2020 - 19:00<br></td>
                            </tr>
                            <tr>
                                <td><a href="">Astralis vs BIG</a></td>
                                <td>20.03.2020 - 19:00<br></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-xl-3"></div>
        </div>
    </div>


@endsection
