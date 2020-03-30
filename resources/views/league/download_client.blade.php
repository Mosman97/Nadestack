@extends('templates.default_template')

@section('content')

    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col colum_content_small">
                <h1 class="text-center nadestack_heading_one">Download Nadestack Client</h1>
                <div class="row text-center">
                    <div class="col-xl-2"></div>
                    <div class="col"><label class="col-form-label">Download the Client to play. While you are playing on our servers, you need to start the monitoring in Moss. After the match you are able to upload the data to our servers. </label></div>
                    <div class="col-xl-2"></div>
                </div>
                <div class="row" style="padding-bottom: 15px;">
                    <div class="col text-center"><button class="btn nadestack_btn" type="button">Download Client</button></div>
                </div>
                <div class="row text-center">
                    <div class="col"><label class="col-form-label">Supports only Windows 64 Bit</label></div>
                </div>
            </div>
            <div class="col-xl-3 d-none d-lg-block" style="margin-top: 50px;">
                <h2 class="nadestack_heading_three font-weight-bold">League Standing</h2>
                <div class="table-responsive">
                    <table class="table nadestack-tbl table-sm table-borderless" style="color: white;">
                        <thead style="background-color: #131517;">
                        <tr>
                            <th>#</th>
                            <th>Team</th>
                            <th>Maps</th>
                            <th>Points</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="background-color: #303436">
                            <td>1</td>
                            <td><a href="">Deckengloter</a></td>
                            <td>4:2</td>
                            <td>6</td>
                        </tr>
                        <tr class="font-weight-bold">
                            <td>1</td>
                            <td><a href="">Deckengloter</a></td>
                            <td>4:2</td>
                            <td>6</td>
                        </tr>
                        <tr style="background-color: #303436;">
                            <td>2</td>
                            <td><a href="">Frechdachse</a></td>
                            <td>4:2</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><a href="">Big</a></td>
                            <td>2:4</td>
                            <td>3</td>
                        </tr>
                        <tr style="background-color: #303436;">
                            <td>3</td>
                            <td><a href="">Frechdachse</a></td>
                            <td>2:4</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><a href="">Big</a></td>
                            <td>1:5</td>
                            <td>2</td>
                        </tr>
                        <tr style="background-color: #303436">
                            <td>5</td>
                            <td><a href="">Astralis</a></td>
                            <td>1:5</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td><a href="">Astralis</a></td>
                            <td>1:5</td>
                            <td>0</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <h2 class="nadestack_heading_three font-weight-bold">Next Matches:</h2>
                    <div class="row row-striped">
                        <div class="col-2 text-right">
                            <h1 class="display-6"><span class="badge badge-secondary">23</span></h1>
                            <h3>Mar</h3>
                        </div>
                        <div class="col-10">
                            <h3 class="text-uppercase"><strong><a href="">Match vs Astralis</a></strong></h3>
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Monday</li>
                                <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 12:30 PM - 2:00 PM</li>
                                <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> League</li>
                                <li class="list-inline-item"><i class="fa fa-hashtag"></i> 2</li>
                            </ul>
                            <!-- <p>Lorem ipsum dolsit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
                        </div>
                    </div>
                    <div class="row row-striped">
                        <div class="col-2 text-right">
                            <h1 class="display-6"><span class="badge badge-secondary">02</span></h1>
                            <h3>Apr</h3>
                        </div>
                        <div class="col-10">
                            <h3 class="text-uppercase"><strong><a href="">Match vs Astralis</a></strong></h3>
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Monday</li>
                                <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 12:30 PM - 2:00 PM</li>
                                <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> League</li>
                                <li class="list-inline-item"><i class="fa fa-hashtag"></i> 2</li>
                            </ul>
                            <!-- <p>Lorem ipsum dolsit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
