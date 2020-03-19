<div id='nav_container'>
    <nav class="navbar navbar-dark navbar-expand-md sticky-top text-white">
        <a class="navbar-brand" href="{{route('startpage')}}"><img id='nav_logo' src='{{URL::asset('assets/img/logo.png')}}' width="100px"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
                aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active navigationitemsleft grow">
                    <a class="nav-link nav" href="{{route('startpage')}}">News
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="nav-item navigationitemsleft grow">
                    <a class="nav-link " href="#">Forum</a>
                </li>

                <li class="nav-item dropdown navigationitemsleft grow">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">League
                    </a>
                    <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
                        <a class="dropdown-item" href="{{route('myleague')}}">My League</a>
                        <a class="dropdown-item" href="#">Overview</a>
                        <a class="dropdown-item" href="{{route('league_rules')}}">Rules</a>
                        <a class="dropdown-item" href="#">FAQ</a>
                        <a class="dropdown-item" href="{{route('support')}}">Support</a>
                        <a class="dropdown-item" href="{{route('client_download')}}">Download Client</a>
                    </div>
                </li>
                <li class="nav-item navigationitemsleft grow">
                    <a class="nav-link" href="#">Statistics</a>
                </li>

            </ul>
            <ul class="navbar nav">
                @guest
                <li class='nav-item grow'><a class='nav-link'  href='{{ url("login") }}'>Login<a></li>
                            <li class='nav-item grow'><a class='nav-link' href='{{ url("register") }}'>Register<a></li>
                                        @endguest
                                        @auth
                                        <li class="nav-item avatar dropdown">
                                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-56" data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">1 <i class="fa fa-envelope"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-secondary ">
                                                <div class="dropdown-item">  <small><i>{{date('F j, Y, g:i a',strtotime(now())) }}</i></small><br/>
                                                    <p>Lorem ipsum dolor </p></div>
                                                <div class="dropdown-item">  <small><i>{{date('F j, Y, g:i a',strtotime(now())) }}</i></small><br/>
                                                    <p>Lorem ipsum dolor </p></div>
                                                <div class="dropdown-item">  <small><i>{{date('F j, Y, g:i a',strtotime(now())) }}</i></small><br/>
                                                    <p>Lorem ipsum dolor </p></div>

                                            </div>
                                        </li>
                                        <li class="nav-item avatar dropdown">
                                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <img src="{{URL::asset('assets/img/profile_pictures/')}}/{{Auth::user()->avatar_url}}"  height="50px"width="50px" class="rounded-circle z-depth-0"
                                                     alt="avatar image">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-secondary">
                                                <a class="dropdown-item " href="{{route('startpage')}}/user/{{Auth::user()->username}}">My Profile</a>
                                                <a class="dropdown-item " href="{{route('profilesettings')}}">My Team</a>
                                                <a class="dropdown-item " href="{{route('profilesettings')}}">Settings</a>
                                                <a class="dropdown-item " href="{{ route('logout') }}">Logout</a>
                                            </div>
                                        </li>
                                        @endauth
                                        </ul>
                                        </div>
                                        </nav>
                                        </div>



