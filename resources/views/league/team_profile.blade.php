@extends('templates.league_default_template')

@section('content')



{{-- Noch schauen https://www.youtube.com/watch?v=_6BUIktFzLs --}}

<div class="col colum_content_big">
    <div class="row">
        <div class="col">
            <h1 class="text-center" style="padding-top: 15px;">Team Profile</h1>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="team-profile-tab" data-toggle="tab" href="#team-profile" role="tab" aria-controls="home" aria-selected="true">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="team-stats-tab" data-toggle="tab" href="#team-stats" role="tab" aria-controls="contact" aria-selected="false">Stats</a>
                </li>
            </ul>
            <div class="tab-content">
                @if (session('message'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('message') }}
                </div>
                @endif
                <!--Beginn of the teamprofile tab with general information -->
                <div class="tab-pane fade show active" id="team-profile" role="tabpanel" aria-labelledby="team-profile-tab">
                    <div class="row">
                        <div class="col text-center">
                            <h2 class="text-center nadestack-heading">{{$teamdata[0]['team_name']}}</h2>
                        </div>
                        <div class="col text-right">
                            @auth
                            @if(Auth::user()->team_id == $teamdata[0]['team_id'])
                            <button data-toggle="modal" data-target="#leave" class="btn nadestack_btn" style="margin-top: 13px;margin-right: 10px">Leave Team</button>
                            @elseif(Auth::user()->team_id == NULL)
                            <button data-toggle="modal" data-target="#join" class="btn nadestack_btn" style="margin-top: 13px;margin-right: 10px">Join Team</button>
                            @endif
                            @if(Auth::user()->team_id == $teamdata[0]['team_id'] && Auth::user()->id ==  $teamdata[0]['team_admin_id'] ||  $teamdata[0]['team_captain_1_id']  || $teamdata[0]['team_captain_2_id'] || $teamdata[0]['team_manager_id'] )
                            <a type="button" class="btn nadestack_btn" href="{{route('edit_team',Auth::user()->team_id)}}" style="margin-top: 13px;">Edit Team</a>
                            @endif
                            @endauth
                        </div>
                    </div>
                    <div class="row nadestack-profileview">
                        <div class="col" style="text-align: center;"><img class="rounded-circle" src="../assets/img/big2.png" style="width:125px; height:125px;margin-top: 15px;"></div>
                        <div class="col" style="padding-top: 15px;">
                            <div class="row">
                                <div class="col"><label class="col-form-label">League: Starter Division</label></div>
                            </div>
                            <div class="row">
                                <div class="col"><label class="col-form-label">Founded: {{\Carbon\Carbon::parse($teamdata[0]['created_at'])->format('m-d-Y')}}</label></div>
                            </div>
                            <div class="row">
                                <div class="col"><label class="col-form-label">
                                        Website: <a target="_blank" rel="noopener noreferrer" href="https://www.99damage.de">www.99damage.de</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="nadestack-line">
                    <div class="row nadestack-profileview">
                        <div class="col">
                            <h2>Socials</h2>
                        </div>
                        <div class="col">
                            <table class="table nadestack-tbl">
                                <thead>
                                    <tr></tr>
                                </thead>
                                <tbody>
                                    <tr class="nadestack-tbl">
                                        <td>
                                            <a target="_blank" rel="noopener noreferrer" href="https://steam.com">
                                                <img src="../assets/svg/steam-symbol.svg" alt="steamlogo" class="icon_grow" id="steam-symbol">
                                            </a>
                                        </td>
                                        <td>
                                            <a target="_blank" rel="noopener noreferrer" href="https://instagram.com">
                                                <img src="../assets/svg/instagram.svg" alt="instgramlogo" class="icon_grow" id="instagram-symbol">
                                            </a>

                                        </td>
                                        <td>
                                            <a target="_blank" rel="noopener noreferrer" href="https://twitch.com">
                                                <img src="../assets/svg/twitch.svg" alt="twitchlogo" class="icon_grow" id="twitch-symbol">
                                            </a>

                                        </td>
                                        <td>
                                            <a target="_blank" rel="noopener noreferrer" href="https://twitter.com">
                                                <img src="../assets/svg/twitter.svg" alt="twitterlogo" class="icon_grow" id="twitter-symbol">
                                            </a>
                                        </td>
                                        <td>
                                            <a target="_blank" rel="noopener noreferrer" href="https://youtube.com">
                                                <img src="../assets/svg/youtube.svg" alt="youtubelogo" class="icon_grow" id="yotube-symbol">
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr class="nadestack-line">
                    <div class="row">
                        <div class="col" style="padding-top: 15px;">
                            <h3>Members</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responive">
                                <table class="table nadestack-tbl text-center table-sm">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Joined in</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($teammembers as $teammember)
                                        
                                   {{$teammember['username']}}
                                        {{var_dump($teammember)}}
                                    <p>ss</p>
                                  
                                        @endforeach
                                        <tr>
                                            <td>
                                                <a href=".\profile.html">
                                                    <img class="rounded-circle player-pic-small" src="../assets/img/big2.png" >
                                                </a>
                                            </td>
                                            <td><a href="">syn</a></td>
                                            <td> Admin</td>
                                            <td>2019-20-12</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href=".\profile.html">
                                                    <img class="rounded-circle player-pic-small" src="../assets/img/anonymous_4.jpg">
                                                </a>
                                            </td>
                                            <td><a href="">syn</a></td>
                                            <td>Captain</td>
                                            <td>2019-20-12</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href=".\profile.html">
                                                    <img class="rounded-circle player-pic-small" src="../assets/img/big2.png">
                                                </a>
                                            </td>
                                            <td><a href="">syn</a></td>
                                            <td>Captian</td>
                                            <td>2019-20-12</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href=".\profile.html">
                                                    <img class="rounded-circle player-pic-small" src="../assets/img/anonymous_4.jpg">
                                                </a>
                                            </td>
                                            <td><a href="">syn</a></td>
                                            <td> Player</td>
                                            <td>2019-20-12</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href=".\profile.html">
                                                    <img class="rounded-circle player-pic-small" src="../assets/img/big2.png">
                                                </a>
                                            </td>
                                            <td><a href="">syn</a></td>
                                            <td> Player</td>
                                            <td>2019-20-12</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href=".\profile.html">
                                                    <img class="rounded-circle player-pic-small" src="../assets/img/big2.png">
                                                </a>
                                            </td>
                                            <td><a href="">syn</a></td>
                                            <td> Player</td>
                                            <td>2019-20-12</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href=".\profile.html">
                                                    <img class="rounded-circle player-pic-small" src="../assets/img/anonymous_4.jpg">
                                                </a>
                                            </td>
                                            <td><a href="">syn</a></td>
                                            <td> Player</td>
                                            <td>2019-20-12</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href=".\profile.html">
                                                    <img class="rounded-circle player-pic-small" src="../assets/img/rick_and_morty_3.jpg">
                                                </a>
                                            </td>
                                            <td><a href="">syn</a></td>
                                            <td> Player</td>
                                            <td>2019-20-12</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="padding-top: 15px;">
                            <h3>Recent Matches</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-sm nadestack-tbl text-center">
                                    <thead>
                                        <tr>
                                            <th>Enemy</th>
                                            <th>Result</th>
                                            <th>Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="">Astralis</a></td>
                                            <td>2:0</td>
                                            <td>2019-21-12</td>
                                            <td>
                                                <a href=""><button class="nadestack_btn">View Match</button></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="">Astralis</a></td>
                                            <td>2:1</td>
                                            <td>2019-20-12</td>
                                            <td>
                                                <a href=""><button class="nadestack_btn">View Match</button></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="">Team Liquid</a></td>
                                            <td>2:1</td>
                                            <td>2019-20-12</td>
                                            <td>
                                                <a href=""><button class="nadestack_btn">View Match</button></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="">Team Liquid</a></td>
                                            <td>2:1</td>
                                            <td>2019-20-12</td>
                                            <td>
                                                <a href=""><button class="nadestack_btn">View Match</button></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="">Team Liquid</a></td>
                                            <td>2:1</td>
                                            <td>2019-20-12</td>
                                            <td>
                                                <a href=""><button class="nadestack_btn">View Match</button></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-danger btn-sm text-center text-white" type="button" data-toggle="collapse" data-target="#log_table" style="font-size: 16px;margin-top: -8px;"><i class="fa fa-arrow-circle-o-down"></i></button><span style="padding-left: 10px;padding-top: 1px;">Teamlog</span>
                        </div>
                    </div>
                    <div id="log_table" class="row accordion-body collapse">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-sm nadestack-tbl" style="font-size: small;">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>User</th>
                                            <th>Action</th>
                                            <th>Target</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($logdata as $logentry)
                                        <tr>
                                            <td>{{$logentry->created_at}}</td>
                                            <td><a href="{{route('profilepage',$logentry->performer)}}">{{$logentry->performer}}</a></td>
                                            <td>{{$logentry->action}}</td>

                                            @if($logentry->target_id == NULL)
                                            <td>/</td>
                                            @else
                                            <td><a href="{{route('profilepage',$logentry->target)}}">{{$logentry->target}}</a></td>
                                            @endif
                                            <td><button type="button" class="nadestack_btn" data-toggle="tooltip" data-placement="top" @if($logentry->logtext == NULL)title="No additional Informations about this Logentry" @else title="{{$logentry->logtext}}" @endif><i class="fas fa-info"></i></button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center nadestack-pagination mt-auto ">{{$logdata->render()}}</div>

                        <!--<div class="d-flex justify-content-center nadestack-pagination mt-auto " style="padding-top: 10px" id="news_paginator"></div>-->

                    </div>
                    <div style="margin-bottom: 15px"></div>
                </div>
                <!-- End of the teamprofile tab with general information -->
                <!-- Beginn of the teamstats -->
                <div class="tab-pane fade" id="team-stats" role="tabpanel" aria-labelledby="team-stats-tab">
                    <h2 class="text-center nadestack-heading">{{$teamdata[0]['team_name']}}</h2>

                    <div class="card-deck text-center" style="margin-top: 10px">
                        <div class="card border-danger text-white bg-dark ">
                            <div class="card-body">
                                <h5 class="card-title">Matches</h5>
                                <i class="fa-3x fas fa-map"></i>
                                <p class="card-text" style="margin-top: 5px">4</p>
                            </div>
                        </div>
                        <div class="card border-danger text-white bg-dark ">
                            <div class="card-body">
                                <h5 class="card-title">Siege</h5>
                                <i class="fa-3x fas fa-trophy"></i>
                                <p class="card-text" style="margin-top: 5px">2</p>
                            </div>
                        </div>
                        <div class="card border-danger text-white bg-dark " >
                            <div class="card-body">
                                <h5 class="card-title">Niederlagen</h5>
                                <i class="fa-3x fas fa-window-close"></i>
                                <p class="card-text" style="margin-top: 5px">2</p>
                            </div>
                        </div>
                    </div>

                    <hr class="nadestack-line">
                    <h2 class="nadestack_heading_two">Seasonal Course</h2>

                    <div class="table-responsive">
                        <table class="table nadestack-tbl" style="color: white;">
                            <thead>
                                <tr style="background-color: #303436">
                                    <th>Season</th>
                                    <th>Division</th>
                                    <th>Place</th>
                                    <th>Standing</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Starter Division 24</td>
                                    <td>2</td>
                                    <td>8:2</td>
                                </tr>
                                <tr style="background-color: #303436">
                                    <td>2</td>
                                    <td>4. Division 24</td>
                                    <td>2</td>
                                    <td>8:2</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <div class="matches">
                        <div class="match">
                            <hr class="nadestack-line">
                            <div class="row">
                                <div class="col-xl-5 d-none d-md-block" style="text-align: center;"><img src="../assets/img/maps/de_cache_map.png" style="width: 227px;"></div>
                                <div class="col">
                                    <h3 style="padding-top: 3px;">de_cache</h3>
                                    <div class="row">
                                        <div class="col"><label class="col-form-label">Played:</label> <label class="matches-played">0</label></div>
                                        <div class="col-xl-7"><label class="col-form-label">Wins: </label> <label class=" col-form-label matches-won">12</label></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><label class="col-form-label">Loses: </label> <label class="matches-lost">0</label></div>
                                        <div class="col-xl-7"><label class="col-form-label">Win Percentage: </label> <label class="col-form-label winper">100%</label></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="col-form-label">Last Match:
                                                <a target="_blank" rel="noopener noreferrer" href="https://www.99damage.de">Astralis
                                                </a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="match">
                            <hr class="nadestack-line">
                            <div class="row">
                                <div class="col-xl-5 d-none d-md-block" style="text-align: center;"><img src="../assets/img/maps/de_overpass.jpg" style="width: 227px;"></div>
                                <div class="col">
                                    <h3 style="padding-top: 3px;">de_overpass</h3>
                                    <div class="row">
                                        <div class="col"><label class="col-form-label">Played: 12</label></div>
                                        <div class="col-xl-7"><label class="col-form-label">Wins: 12</label></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><label class="col-form-label">Loses: 0</label></div>
                                        <div class="col-xl-7"><label class="col-form-label">Win Percentage: </label> <label class="col-form-label winper">100%</label></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="col-form-label">Last Match:
                                                <a target="_blank" rel="noopener noreferrer" href="https://www.99damage.de">Astralis
                                                </a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="match">
                            <hr class="nadestack-line">
                            <div class="row">
                                <div class="col-xl-5 d-none d-md-block" style="text-align: center;"><img src="../assets/img/maps/de_inferno.jpg" style="width: 227px;"></div>
                                <div class="col">
                                    <h3 style="padding-top: 3px;">de_inferno</h3>
                                    <div class="row">
                                        <div class="col"><label class="col-form-label">Played: 12</label></div>
                                        <div class="col-xl-7"><label class="col-form-label">Wins: 12</label></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><label class="col-form-label">Loses: 0</label></div>
                                        <div class="col-xl-7"><label class="col-form-label">Win Percentage: </label> <label class="col-form-label winper">61%</label></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="col-form-label">Last Match:
                                                <a target="_blank" rel="noopener noreferrer" href="https://www.99damage.de">Astralis
                                                </a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="match">
                            <hr class="nadestack-line">
                            <div class="row">
                                <div class="col-xl-5 d-none d-md-block" style="text-align: center;"><img src="../assets/img/maps/de_dust2.jpg" style="width: 227px;"></div>
                                <div class="col">
                                    <h3 style="padding-top: 3px;">de_dust2</h3>
                                    <div class="row">
                                        <div class="col"><label class="col-form-label">Played: 12</label></div>
                                        <div class="col-xl-7"><label class="col-form-label">Wins: 12</label></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><label class="col-form-label">Loses: 0</label></div>
                                        <div class="col-xl-7"><label class="col-form-label">Win Percentage: </label> <label class="col-form-label winper">60%</label></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="col-form-label">Last Match:
                                                <a target="_blank" rel="noopener noreferrer" href="https://www.99damage.de">Astralis
                                                </a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="match nadestack-last-element">
                            <hr class="nadestack-line">
                            <div class="row">
                                <div class="col-xl-5 d-none d-md-block" style="text-align: center;"><img src="../assets/img/maps/de_mirage.jpg" style="width: 227px;"></div>
                                <div class="col">
                                    <h3 style="padding-top: 3px;">de_mirage</h3>
                                    <div class="row">
                                        <div class="col"><label class="col-form-label">Played: 12</label></div>
                                        <div class="col-xl-7"><label class="col-form-label">Wins: 12</label></div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><label class="col-form-label">Loses: 0</label></div>
                                        <div class="col-xl-7"><label class="col-form-label">Win Percentage: </label> <label class="col-form-label winper">30%</label></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="col-form-label">Last Match:
                                                <a target="_blank" rel="noopener noreferrer" href="https://www.99damage.de">Astralis
                                                </a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of the teamstats -->
            </div>
        </div>
    </div>
</div>




<!-- Teamleave Modal -->
<div  id="leave"class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm your Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>You are about to leave your Team are you sure?</p>
            </div>
            <div class="modal-footer">


                <form  method="POST" action="{{route('leave_team')}}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Leave Team</button>

                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


<!-- Teamjoin Modal -->
<div  id="join"class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm your Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form  method="POST" action="{{route('leave_team')}}">
                @csrf
                <div class="modal-body text-center">
                    <p>Please Enter the Password</p>
                    <input type="password">
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-danger">Join Team</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Ban Modal -->
<div class="modal fade" id="teamleave_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Banoptions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <h6 class="text-center">Timeout-Option</h6>
                    <div class="form-group row">
                        <label for="timeout_value" class="col-4 col-form-label">Timeout:</label>
                        <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-calendar-times-o"></i>
                                    </div>
                                </div>
                                <input id="timeout_value" name="timeout_value" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h6 class="text-center">Permaban-Option</h6>

                    <div class="form-group row">
                        <label class="col-4">Permaban:</label>
                        <div class="col-8">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="checkbox" id="checkbox_0" type="checkbox" class="custom-control-input" value="permaban" aria-describedby="checkboxHelpBlock">
                                <label for="checkbox_0" class="custom-control-label">Perman Player</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Abort</button>
                <button type="button" id="delete_news_btn" class="btn btn-danger" >Leave Team</button>
            </div>
        </div>
    </div>
</div>


@endsection
