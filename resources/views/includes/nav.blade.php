<div id="nav_container">
    <nav class="navbar navbar-dark navbar-expand-md sticky-top text-white">
        <div class="container-fluid">
            <div class="col-xl-3">
                <a class="navbar-brand" href="{{route('startpage')}}"><img id='nav_logo' src='{{URL::asset('assets/img/logo.png')}}' width="100px"/></a>
                <div class="text-center">
                    <button data-toggle="collapse" data-target="#nadestack-main-menu,#nadestack-second-menu" class="navbar-toggler">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="collapse navbar-collapse" id="nadestack-main-menu">
                    <ul class="nav navbar-nav ml-auto mr-auto">
                        <li class="nav-item navigationitemsleft" role="presentation"><a class="nav-link active" href="{{route('startpage')}}">News</a></li>
                        <li class="nav-item navigationitemsleft" role="presentation"><a class="nav-link active" href="#">Forum</a></li>
                        <li class="nav-item dropdown navigationitemsleft">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">League</a>
                            <div class="dropdown-menu dropdown-secondary nadestack-dropdown-menu" aria-labelledby="navbarDropdownMenuLink-555">
                                <a class="dropdown-item" href="{{route('myleague')}}">My League</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('league_overview')}}">Overview</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('league_rules')}}">Rules</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">FAQ</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('support')}}">Support</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('client_download')}}">Download Client</a>
                            </div>
                        </li>
                        <li class="nav-item navigationitemsleft" role="presentation"><a class="nav-link active" href="#">Statistics</a></li>
                        <form class="form-inline">
                            <div class="form-group" id="search_bar">
                                <label class="d-xl-flex justify-content-xl-start align-items-xl-center" id="search_bar_label"><i class="fa fa-search" id="search_bar_icon">
                                    </i><input class="form-control" type="search" id="ip">
                                </label>
                            </div>
                        </form>
                    </ul>

                </div>
            </div>
            <div class="col">
                <div class="collapse navbar-collapse" id="nadestack-second-menu">
                    <ul class="nav navbar-nav ml-auto">
                        @guest
                        <li class="nav-item" role="presentation"><a class="nav-link text-white" href='{{ url("login") }}'>Login</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link text-white" href='{{ url("register") }}'>Register</a></li>
                        @endguest
                        @auth
                        <li class="nav-item avatar dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-56" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">1 <i class="fa fa-envelope"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-secondary nadestack-dropdown-menu ">
                                <div class="dropdown-item"><small><i>{{date('F j, Y, g:i a',strtotime(now())) }}</i></small><br/><p>Lorem ipsum dolor </p></div>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-item"><small><i>{{date('F j, Y, g:i a',strtotime(now())) }}</i></small><br/><p>Lorem ipsum dolor </p></div>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-item"><small><i>{{date('F j, Y, g:i a',strtotime(now())) }}</i></small><br/><p>Lorem ipsum dolor </p></div>
                            </div>
                        </li>
                        <li class="nav-item avatar dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" class="nadestack-dropdown-menu"data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
                                <img src="{{URL::asset('assets/img/profile_pictures/')}}/{{Auth::user()->avatar_url}}"  height="50px"width="50px" class="rounded-circle z-depth-0"alt="avatar image">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-secondary nadestack-dropdown-menu">
                                <a class="dropdown-item " href="{{route('startpage')}}/user/{{Auth::user()->username}}">My Profile</a>

                                @if(Auth::user()->team_id != NULL)
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item " href="{{route('teampage',Auth::user()->team_id)}}">My Team</a>
                                @endif

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item " href="{{route('profilesettings')}}">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item " href="{{ route('logout') }}">Logout</a>
                            </div>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
