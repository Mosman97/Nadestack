@extends('templates.default_template')

@section('content')
    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6 colum_content_big">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="wrapper wrapper-content">
                            <div class="ibox-content m-b-sm border-bottom" style="border-top: none;">
                                <div class="p-xs">
                                    <div class="pull-left m-r-md">
                                        <img id='nav_logo' src='{{URL::asset('assets/img/logo.png')}}' width="120px" style="float: left"/>
                                    </div>
                                    <h2>Welcome to the official Nadestack Forum!</h2>
                                    <span>Feel free to choose topic you're interested in.</span>
                                </div>
                            </div>


                            <div class="ibox-content forum-container">

                                <div class="forum-title">
                                    <div class="pull-right forum-desc" style="float: right">
                                        <samll>Total posts: 320,800</samll>
                                    </div>
                                    <h3>General subjects</h3>
                                </div>

                                <div class="forum-item">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="forum-icon">
                                                <i class="fa fa-shield-alt"></i>
                                            </div>
                                            <a href="forum_post.html" class="forum-item-title">General Discussion</a>
                                            <div class="forum-sub-title">General discussions about any eSports related topics</div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    1216
                                                </span>
                                            <div class="views-number-description">
                                                <small>Views</small>
                                            </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    368
                                                </span>
                                            <div class="views-number-description">
                                                <small>Topics</small>
                                            </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    140
                                                </span>
                                            <div class="views-number-description">
                                                <small>Posts</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="forum-item">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="forum-icon">
                                                <i class="fa fa-users"></i>
                                            </div>
                                            <a href="forum_post.html" class="forum-item-title">Player searching a team</a>
                                            <div class="forum-sub-title">If you're a player who currently a looking for a team. This is the place to go!</div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    890
                                                </span>
                                            <div class="views-number-description">
                                                <small>Views</small>
                                            </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    120
                                                </span>
                                            <div class="views-number-description">
                                                <small>Topics</small>
                                            </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    154
                                                </span>
                                            <div class="views-number-description">
                                                <small>Posts</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="forum-item">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="forum-icon">
                                                <i class="fa fa-user-plus"></i>
                                            </div>
                                            <a href="forum_post.html" class="forum-item-title">Team searching a player </a>
                                            <div class="forum-sub-title">If you're a team who's currently looking for new valuable players. This is the place to go!. </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    680
                                                </span>
                                            <div class="views-number-description">
                                                <small>Views</small>
                                            </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    124
                                                </span>
                                            <div class="views-number-description">
                                                <small>Topics</small>
                                            </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    61
                                                </span>
                                            <div class="views-number-description">
                                                <small>Posts</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="forum-item">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="forum-icon">
                                                <i class="fa fa-trophy"></i>
                                            </div>
                                            <a href="forum_post.html" class="forum-item-title">Competition Area</a>
                                            <div class="forum-sub-title">Here you can talk/discuss about leagues, tournaments and events </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    1450
                                                </span>
                                            <div class="views-number-description">
                                                <small>Views</small>
                                            </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    652
                                                </span>
                                            <div class="views-number-description">
                                                <small>Topics</small>
                                            </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    572
                                                </span>
                                            <div class="views-number-description">
                                                <small>Posts</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="forum-item">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="forum-icon">
                                                <i class="fa fa-video"></i>
                                            </div>
                                            <a href="forum_post.html" class="forum-item-title">Broadcast</a>
                                            <div class="forum-sub-title">Here you can talk/discuss about VODs, demos, livestreams, fragclips and similar stuff. Feel free to introduce yourself to the community!</div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    1450
                                                </span>
                                            <div class="views-number-description">
                                                <small>Views</small>
                                            </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    652
                                                </span>
                                            <div class="views-number-description">
                                                <small>Topics</small>
                                            </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    572
                                                </span>
                                            <div class="views-number-description">
                                                <small>Posts</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="forum-title">
                                    <div class="pull-right forum-desc" style="float: right">
                                        <samll>Total posts: 17,800,600</samll>
                                    </div>
                                    <h3>Other subjects</h3>
                                </div>

                                <div class="forum-item">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="forum-icon">
                                                <i class="fa fa-comment"></i>
                                            </div>
                                            <a href="forum_post.html" class="forum-item-title">Feedback </a>
                                            <div class="forum-sub-title">Here you can provide suggestions for improvement. We all can learn from each other, maybe you got the right idea what we could change in the future!</div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    1516
                                                </span>
                                            <div class="views-number-description">
                                                <small>Views</small>
                                            </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    238
                                                </span>
                                            <div class="views-number-description">
                                                <small>Topics</small>
                                            </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    180
                                                </span>
                                            <div class="views-number-description">
                                                <small>Posts</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="forum-item">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="forum-icon">
                                                <i class="fa fa-bookmark"></i>
                                            </div>
                                            <a href="forum_post.html" class="forum-item-title">Off-Topic</a>
                                            <div class="forum-sub-title"> Discussions on anything not seriously related to eSports or Nadestack</div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    1766
                                                </span>
                                            <div class="views-number-description">
                                                <small>Views</small>
                                            </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    321
                                                </span>
                                            <div class="views-number-description">
                                                <small>Topics</small>
                                            </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    42
                                                </span>
                                            <div class="views-number-description">
                                                <small>Posts</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="forum-item">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="forum-icon">
                                                <i class="fa fa-desktop"></i>
                                            </div>
                                            <a href="forum_post.html" class="forum-item-title">Hardware & Tweaks</a>
                                            <div class="forum-sub-title">Here you can discuss about any technical stuff like talking about the newest hardware!</div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    765
                                                </span>
                                            <div class="views-number-description">
                                                <small>Views</small>
                                            </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    90
                                                </span>
                                            <div class="views-number-description">
                                                <small>Topics</small>
                                            </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    11
                                                </span>
                                            <div class="views-number-description">
                                                <small>Posts</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3"></div>
            </div>
        </div>
    </div>
@endsection
