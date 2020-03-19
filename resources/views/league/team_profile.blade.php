@extends('templates.default_template')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 offset-xl-0"></div>
            <div class="col-xl-6 colum_content_big">
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
                            <!--new Tab-->
                            <div class="tab-pane fade show active" id="team-profile" role="tabpanel" aria-labelledby="team-profile-tab">
                                <h2 class="text-center nadestack-heading">Berlin International Gaming</h2>
                                <div class="row nadestack-profileview">
                                    <div class="col" style="text-align: center;"><img class="rounded-circle" src="../assets/img/big2.png" style="width:125px; height:125px;margin-top: 15px;"></div>
                                    <div class="col" style="padding-top: 15px;">
                                        <div class="row">
                                            <div class="col"><label class="col-form-label">League: Starter Division</label></div>
                                        </div>
                                        <div class="row">
                                            <div class="col"><label class="col-form-label">Founded: 2019-02-22</label></div>
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
                                                    <a target="_blank" rel="noopener noreferrer" href="https://faceit.com">
                                                        <img src="../assets/svg/faceit.svg" alt="faceitlogo" class="icons" id="faceit-logo">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a target="_blank" rel="noopener noreferrer" href="https://steam.com">
                                                        <img src="../assets/svg/steam-symbol.svg" alt="steamlogo" class="icons" id="steam-symbol">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a target="_blank" rel="noopener noreferrer" href="https://instagram.com">
                                                        <img src="../assets/svg/instagram.svg" alt="instgramlogo" class="icons" id="instagram-symbol">
                                                    </a>

                                                </td>
                                                <td>
                                                    <a target="_blank" rel="noopener noreferrer" href="https://twitch.com">
                                                        <img src="../assets/svg/twitch.svg" alt="twitchlogo" class="icons" id="twitch-symbol">
                                                    </a>

                                                </td>
                                                <td>
                                                    <a target="_blank" rel="noopener noreferrer" href="https://twitter.com">
                                                        <img src="../assets/svg/twitter.svg" alt="twitterlogo" class="icons" id="twitter-symbol">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a target="_blank" rel="noopener noreferrer" href="https://youtube.com">
                                                        <img src="../assets/svg/youtube.svg" alt="youtubelogo" class="icons" id="yotube-symbol">
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
                                            <table class="table nadestack-tbl text-center">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Role</th>
                                                    <th>Joined in</th>
                                                </tr>
                                                </thead>
                                                <tbody>
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
                                            <table class="table nadestack-tbl text-center">
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
                            </div>
                            <!-- New TAB -->
                            <div class="tab-pane fade" id="team-stats" role="tabpanel" aria-labelledby="team-stats-tab">
                                <h2 class="text-center nadestack-heading">Berlin International Gaming</h2>
                                <div class="row">
                                    <div class="col"><label class="col-form-label">Wins: 100</label></div>
                                </div>
                                <div class="row">
                                    <div class="col"><label class="col-form-label">Niederlagen: 0</label></div>
                                </div>

                                <div class="matches">
                                    <div class="match">
                                        <hr class="nadestack-line">
                                        <div class="row">
                                            <div class="col-xl-5" style="text-align: center;"><img src="../assets/img/maps/de_cache_map.png" style="width: 227px;"></div>
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
                                            <div class="col-xl-5" style="text-align: center;"><img src="../assets/img/maps/de_overpass.jpg" style="width: 227px;"></div>
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
                                            <div class="col-xl-5" style="text-align: center;"><img src="../assets/img/maps/de_inferno.jpg" style="width: 227px;"></div>
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
                                            <div class="col-xl-5" style="text-align: center;"><img src="../assets/img/maps/de_dust2.jpg" style="width: 227px;"></div>
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
                                    <div class="match">
                                        <hr class="nadestack-line">
                                        <div class="row">
                                            <div class="col-xl-5" style="text-align: center;"><img src="../assets/img/maps/de_mirage.jpg" style="width: 227px;"></div>
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
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
