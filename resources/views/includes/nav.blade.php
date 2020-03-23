<div id="nav_container">
    <nav class="navbar navbar-expand-lg navbar-dark ">
        <a class="navbar-brand" href="{{route('startpage')}}"><img id='nav_logo' src='{{URL::asset('assets/img/logo.png')}}' width="100px"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ml-auto" style="float: unset; margin-top: 10px;">
                <li class="nav-item active navigationitemsleft" role="presentation">
                    <a class="nav-link active" href="{{route('startpage')}}">News<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item navigationitemsleft" role="presentation"><a class="nav-link" href="#">Forum</a></li>
                <li class="nav-item  navigationitemsleft dropdown"style="margin-left: unset;"><a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">League</a>
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
                <li class="nav-item navigationitemsleft" role="presentation"><a class="nav-link" href="#">Statistics</a></li>
                <li class="nav-item navigationitemsleft" role="presentation">
                    <form class="form-inline">
                        <div class="form-group" id="search_bar"><label class="d-xl-flex justify-content-xl-start align-items-xl-center" id="search_bar_label"><i class="fa fa-search" id="search_bar_icon"></i><input class="form-control" type="search" id="ip"></label></div>
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav nadestack-second-menu">
                @guest
                <li class="nav-item" role="presentation"><a class="nav-link" href='{{ url("login") }}'>Login</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link  " href='{{ url("register") }}'><button class="nadestack_btn ">Register</button></a></li>
                @endguest
                    @auth
                        <li class="nav-item avatar dropdown" style="align-self: center">
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
    </nav>
</div>
