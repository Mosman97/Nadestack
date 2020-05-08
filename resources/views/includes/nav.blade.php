<div id="nav_container">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1C2022">
        <a class="navbar-brand" href="{{route('startpage')}}"><img id='nav_logo' src='{{URL::asset('assets/img/logo.png')}}' width="80px"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ml-auto" style="float: unset; margin-top: 10px;">
                <li class="nav-item active navigationitemsleft" role="presentation">
                    <a class="nav-link active" href="{{route('startpage')}}">News<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item navigationitemsleft" role="presentation"><a class="nav-link" href="{{route('forum')}}">Forum</a></li>
                <li class="nav-item  navigationitemsleft dropdown"style="margin-left: unset;"><a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">League</a>
                    <div class="dropdown-menu dropdown-secondary nadestack-dropdown-menu" aria-labelledby="navbarDropdownMenuLink-555">
                        @auth
                        <a class="dropdown-item" href="{{route('myleague')}}">My League</a>
                        <div class="dropdown-divider"></div>
                        @endauth
                        <a class="dropdown-item" href="{{route('league_overview')}}">Overview</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('league_rules')}}">Rules</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('faq')}}">FAQ</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('support')}}">Support</a>
                        <!-- vorerst wird kein ac verwendet!
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('client_download')}}">Download Client</a>
                        -->
                    </div>
                </li>
                <li class="nav-item navigationitemsleft" role="presentation"><a class="nav-link" href="{{route('statistics')}}">Statistics</a></li>
                <li class="nav-item navigationitemsleft" role="presentation">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search for..." aria-describedby="addonsearch" style="border-top-left-radius: 6px;border-bottom-left-radius: 6px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addonsearch" style="border-top-right-radius: 6px;border-bottom-right-radius: 6px;"><a href="{{route('search')}}" style="color: grey"><i class="fa fa-search" id="search_bar_icon"></i></a></span>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav nadestack-second-menu">
                @guest
                <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="modal" data-target="#modalLogin">Login</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link  " href='{{ url("register") }}'><button class="nadestack_btn" style="background-color: #86C232">Register</button></a></li>
                @endguest
                @auth
                <div class="align-self-start align-self-md-center">
                    <li class="nav-item avatar dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-56" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">{{Auth::user()->unReadNotifications->count() }} <i class="fa fa-envelope"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-secondary nadestack-dropdown-menu ">
                            @foreach (Auth::user()->unReadNotifications as $notification)
                            <div class="dropdown-item"><small><i>{{date('F j, Y, g:i a',strtotime($notification->created_at)) }}</i></small><br/><p> {{$notification->data['data']}}</p></div>
                            <div class="dropdown-divider"></div>
                            @endforeach
                            @if(Auth::user()->unReadNotifications->count() > 0)
                            <div class="dropdown-item"><a href="{{route('readAllNotifications')}}" type="button" class="nadestack_btn">Mark All as Read</a></div>
                            @else
                            <div class="dropdown-item">No New Notifications</div>
                            @endif
                        </div>
                    </li>
                </div>
                <li class="nav-item avatar dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" class="nadestack-dropdown-menu"data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
                        <img src="{{URL::asset('assets/img/profile_pictures/')}}/{{Auth::user()->avatar_url}}"  height="50px"width="50px" class="rounded-circle z-depth-0"alt="avatar image">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-secondary nadestack-dropdown-menu">

                        <a class="dropdown-item " href="{{route('startpage')}}/user/{{Auth::user()->username}}">
                            <i class="fa fa-user"></i><span class='nadestack-usermenu-icon'></span>
                            My Profile</a>
                        @if(Auth::user()->team_id != NULL)
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item " href="{{route('teampage',Auth::user()->team_id)}}"><i class="fa fa-users"></i><span class='nadestack-usermenu-icon'></span>My Team</a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item " href="{{route('profilesettings')}}"><i class="fa fa-user-cog"></i><span class='nadestack-usermenu-icon'></span>Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item " href="{{route('profiletickets')}}"><i class="fa fa-ticket-alt"></i><span class='nadestack-usermenu-icon '></span>Support Tickets</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item " href="{{ route('logout') }}"><i class="fa fa-sign-out-alt"></i><span class='nadestack-usermenu-icon '></span>Logout</a>
                    </div>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
</div>

<!-- modaler dialog für den login -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true" style="color: white">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #474B4F; font-family: 'Roboto';">
            <form action="{{ route('login')}}"  method="POST">
                @csrf
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5 text-center">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Username</label>
                        <input name="username" type="text" id="defaultForm-email" class="form-control validate">
                        <a class="float-right" style="color: grey" href="{{route('account.usernameforget')}}">Forgot Username?</a>
                    </div>

                    <div class="md-form mb-4 text-center">
                        <label  data-error="wrong" data-success="right" for="defaultForm-pass">Password</label>
                        <input name="password" type="password" id="defaultForm-pass" class="form-control validate">
                        <a class="float-right" style="color: grey" href="{{url('/password/reset')}}">Forgot Password?</a>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn nadestack_btn" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
