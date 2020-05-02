@extends('templates.default_template')

@section('content')



<div class="container-fluid" >
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col colum_content_big">
            <div class="row nadestack-row">
                <div class="col">
                    <h1 class="text-center nadestack-heading">Player Profile</h1>
                </div>
                <div class="col">
                    <!--Nav-Tab mit JS See: https://getbootstrap.com/docs/4.0/components/navs/#javascript-behavior -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#player-profile" role="tab" aria-controls="player-profile" aria-selected="true">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="stats-tab" data-toggle="tab" href="#player-stats" role="tab" aria-controls="player-stats" aria-selected="false">Stats</a>
                        </li>
                    </ul>
                    @foreach ($userdata as $user)
                    <div class="tab-content" id="myTabContent">
                        <!-- Begin of the profile tab/general Infos-->
                        <div class="tab-pane fade show active" id="player-profile" role="tabpanel" aria-labelledby="player-profile-tab">
                            <div class="row">
                                <div class="col-xl-3">
                                    <div class="row">
                                        <div class="col-xl-12 text-center d-xl-flex justify-content-xl-center align-items-xl-center"><img class="rounded-circle d-xl-flex justify-content-xl-center align-items-xl-center player-pic-big" src="{{URL::asset('assets/img/profile_pictures/')}}/{{$user->avatar_url}}"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h2 class="text-center nadestack-heading">{{$user->username}}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="row">
                                        <div class="col">
                                            <h2 class="text-center text-white nadestack-heading">About {{$user->username}}</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-center">@if ($user->profiledescription != NULL) {{$user->profiledescription}} @else No Information about this User @endif</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-center d-xl-flex justify-content-xl-center align-items-xl-center">
                                            <a href=""><img class="rounded-circle d-xl-flex justify-content-xl-center align-items-xl-center team-pic-big" src="../assets/img/BIG2.png"></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="text-center nadestack-heading">Current Team:</h5>
                                            @if($user->team_name !=NULL)<h3 class="text-center"><a href="{{route('teampage',$user->team_id)}}">{{$user->team_name}}</a></h3>
                                            @else<h3 class="text-center">/</h3>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="nadestack-line">
                            <div class="row">
                                <div class="col">
                                    <h2>General:</h2>
                                </div>
                                <div class="col">
                                    <table class="table nadestack-tbl-noborder">
                                        <thead>
                                            <tr></tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Name:</td>
                                                <td>{{$user->forname}}</td>
                                            </tr>
                                            <tr>
                                                <td>Flagge</td>
                                                <td>Deutschland</td>
                                            </tr>
                                            <tr>
                                                <td>Age:</td>
                                                <td>22</td>
                                            </tr>
                                            <tr>
                                                <td>Member since:</td>
                                                <td>{{$user->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <td>Posts:</td>
                                                <td>1340</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr class="nadestack-line">
                            <div class="row nadestack-profileview">
                                <div class="col">
                                    <h2>Socials:</h2>
                                </div>
                                <div class="col">
                                    <table class="table nadestack-tbl-noborder">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    @if($user->faceit_url != NULL)
                                                    <a target="_blank" rel="noopener noreferrer" href="{{$user->faceit_url}}">
                                                        <img src="../assets/svg/faceit.svg" alt="faceitlogo" class="social_icon_size icon_grow" id="faceit-symbol">
                                                    </a>
                                                    @else
                                                    <a target="_blank">
                                                        <img src="../assets/svg/faceit.svg" alt="faceitlogo" class=" social_icon_size black_and_white_img" id="faceit-symbol">
                                                    </a>
                                                    @endif
                                                </td>
                                                <td>

                                                    {{--TODO Backend SteamID to URl Convert--}}

                                                    @if($user->steamid != NULL)
                                                    <a target="_blank" rel="noopener noreferrer" href="">
                                                        <img src="../assets/svg/steam-symbol.svg" alt="steamlogo" class="icon_grow social_icon_size" id="steam-symbol">
                                                    </a>

                                                    @else
                                                    <a target="_blank">
                                                        <img src="../assets/svg/steam-symbol.svg" alt="steamlogo" class="black_and_white_img social_icon_size" id="steam-symbol">
                                                    </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->instagram_url != NULL)
                                                    <a target="_blank" rel="noopener noreferrer" href="{{$user->instagram_url}}">
                                                        <img src="../assets/svg/instagram.svg" alt="instgramlogo" class="icon_grow" id="instagram-symbol">
                                                    </a>
                                                    @else
                                                    <a target="_blank">
                                                        <img src="../assets/svg/instagram.svg" alt="instgramlogo" class="black_and_white_img social_icon_size" id="instagram-symbol">
                                                    </a>
                                                    @endif

                                                </td>
                                                <td>
                                                    @if($user->twitch_url != NULL)
                                                    <a target="_blank" rel="noopener noreferrer" href="{{$user->twitch_url}}">
                                                        <img src="../assets/svg/twitch.svg" alt="twitchlogo" class="icon_grow" id="twitch-symbol">
                                                    </a>
                                                    @else
                                                    <a target="_blank">
                                                        <img src="../assets/svg/twitch.svg" alt="twitchlogo" class="black_and_white_img social_icon_size" id="twitch-symbol">
                                                    </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->twitter_url != NULL)
                                                    <a target="_blank" rel="noopener noreferrer" href="{{$user->twitter_url}}">
                                                        <img src="../assets/svg/twitter.svg" alt="twitterlogo" class="icon_grow social_icon_size" id="twitter-symbol">
                                                    </a>
                                                    @else
                                                    <a target="_blank">
                                                        <img src="../assets/svg/twitter.svg" alt="twitterlogo" class="social_icon_size black_and_white_img" id="twitter-symbol">
                                                    </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->youtube_url !=NULL)
                                                    <a target="_blank" rel="noopener noreferrer" href="{{$user->youtube_url}}">
                                                        <img src="../assets/svg/youtube.svg" alt="youtubelogo" class="icon_grow social_icon_size" id="yotube-symbol">
                                                    </a>
                                                    @else
                                                    <a target="_blank">
                                                        <img src="../assets/svg/youtube.svg" alt="youtubelogo" class="black_and_white_img social_icon_size" id="yotube-symbol">
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr class="nadestack-line">
                            <div class="row">
                                <div class="col">
                                    <h2 class="text-center">Team History</h2>
                                    <div class="table-responsive">
                                        <table class="table text-center nadestack-tbl">
                                            <thead>
                                                <tr>
                                                    <th>Team</th>
                                                    <th>Join Date</th>
                                                    <th>Leave Date</th>
                                                    <th>Period (Days)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>BIG</td>
                                                    <td>2019-02-30</td>
                                                    <td>2019-02-31</td>
                                                    <td>1 Day</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of the profile tab/general Infos-->
                        <!-- Begin of the Statistic -->
                        <div class="tab-pane fade" id="player-stats" role="tabpanel" aria-labelledby="player-stats-tab">
                            <div class="col">
                                <h2 class="text-center nadestack-heading">Statistics of {{$user->username}}</h2>
                            </div>
                            <div class="row">
                                <div class="col text-center d-xl-flex justify-content-xl-center align-items-xl-center"><img class="rounded-circle d-xl-flex justify-content-xl-center align-items-xl-center" src="{{URL::asset('assets/img/profile_pictures/')}}/{{$user->avatar_url}}" width="100px" height="100px" style="margin-bottom: 0px;padding-bottom: 0px;margin-top: 40px;"></div>
                            </div>
                            <!-- <div class="row">
                                <div class="col">
                                    <h2 class="text-center nadestack-heading">der_Baiter</h2>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col"><label class="col-form-label">Rating 2.0 :&nbsp;&nbsp;</label></div>
                            </div>
                            <div class="row">
                                <div class="col"><label class="col-form-label">ADR :&nbsp;&nbsp;</label></div>
                            </div>
                            <div class="row">
                                <div class="col"><label class="col-form-label">Matches :&nbsp;&nbsp;</label></div>
                            </div>

                            <!-- <div class="row">
                                <div class="col" style="padding-bottom: 12px;padding-top: 8px;"><button class="btn btn-danger btn-sm text-center text-white" type="button" data-toggle="collapse" data-target="#sub_rules_1" style="font-size: 16px;margin-top: -8px;"><i class="fa fa-arrow-circle-o-down"></i></button><span style="font-size: 16px;margin-right: 0px;padding: 0px;padding-left: 10px;padding-top: 1px;padding-bottom: 0px;margin-bottom: 0px;margin-top: 0px;">Show Details</span></div>
                            </div> -->
                            <div class="row">
                                <div class="col"><h3 class="text-center">Detail Statistics:</h3></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="table-responsive">
                                        <table class="table nadestack-tbl">
                                            <thead>
                                                <tr style="border: none;">
                                                    <td>Total Kills</td>
                                                    <td class="nadestack-tbl-td-data">23</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="border: none;">
                                                    <td>Total deaths:</td>
                                                    <td class="nadestack-tbl-td-data">10</td>
                                                </tr>
                                                <tr>
                                                    <td>K/D:</td>
                                                    <td class="nadestack-tbl-td-data">2.30</td>
                                                </tr>
                                                <tr>
                                                    <td>Headshot:</td>
                                                    <td class="nadestack-tbl-td-data">75.8 %</td>
                                                </tr>
                                                <tr>
                                                    <td>KAST:</td>
                                                    <td class="nadestack-tbl-td-data">76 %</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="table-responsive">
                                        <table class="table nadestack-tbl">
                                            <thead>
                                                <tr>
                                                    <td>3k</td>
                                                    <td class="nadestack-tbl-td-data">2</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>4k</td>
                                                    <td class="nadestack-tbl-td-data">0</td>
                                                </tr>
                                                <tr>
                                                    <td>5k</td>
                                                    <td class="nadestack-tbl-td-data">1</td>
                                                </tr>
                                                <tr>
                                                    <td>NadeDamage/Map</td>
                                                    <td class="nadestack-tbl-td-data">30</td>
                                                </tr>
                                                <tr>
                                                    <td>Enemies Flashed/Map</td>
                                                    <td class="nadestack-tbl-td-data">23</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- End of the Statistic -->
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-3"></div>
    </div>
</div>

@endsection
