
<div id='nav_container'>
    <nav class="navbar navbar-dark navbar-expand-md sticky-top text-white">
        <a class="navbar-brand" href="{{route('startpage')}}"><img id='nav_logo' src='{{URL::asset('assets/img/logo.png')}}' width="100px"></a>
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
                        <a class="dropdown-item" href="{{url("register")}}">My League</a>
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
                <li class='nav-item grow'><a class='nav-link'  href='{{ url("login") }}'>Login<a></li>
                            <li class='nav-item grow'><a class='nav-link' href='{{ url("register") }}'>Register<a></li>
                                        </ul>
                                        </div>
                                        </nav>
                                        </div>



