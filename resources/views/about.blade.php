@extends('templates.default_template')

@section('content')

    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-2"></div>
            <div class="col colum_content_big">
                <div id="slideshow" class="carousel nadestack-first-element nadestack-last-element" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#slideshow" data-slide-to="0" class="active"></li>
                        <li data-target="#slideshow" data-slide-to="1"></li>
                        <li data-target="#slideshow" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" style="opacity: 0.15;" src='{{URL::asset('assets/img/slides/slider1.jpg')}}'>
                            <div class="carousel-caption d-none d-md-block">
                                <h1>THE CS:GO LEAGUE FOR SHINSKY-TEAMS</h1>
                                <p>First free league with ID verification for europe. We are not allowing smurfs, provide good servers ....</p>
                                <a class="btn nadestack_btn" href="{{route('league_overview')}}">See more</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" style="opacity: 0.15;" src='{{URL::asset('assets/img/slides/slider2.jpg')}}'>
                            <div class="carousel-caption d-none d-md-block">
                                <h1>E-SPORT KANN AUCH FAIR SEIN!</h1>
                                <p>Keine Lust mehr auf Cheater?! Durch unser ausgeklügeltes Anti-Cheat System garantieren wir dir ein faires Spielerlebnis. Strafverfolgung bei Wettkampfbetrug und Identitätsprüfung helfen uns dabei.</p>
                                <a class="btn nadestack_btn" href="'{{ url("register") }}'">Register Now!</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" style="opacity: 0.15;" src='{{URL::asset('assets/img/slides/slider3.jpg')}}'>
                            <div class="carousel-caption d-none d-md-block">
                                <h1>DIE RICHTIGE ADRESSE WENN ES UM ESPORT GEHT.</h1>
                                <p>Werde teil eines exklusiven Esport-Netzwerkes und zeige was in dir steckt! Auf dich warten tägliche Wettkämpfe und ein Liga-System nach Divisionsprinzip.</p>
                                <a class="btn nadestack_btn" href="'{{ url("register") }}'">Register Now!</a>
                            </div>
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#slideshow" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#slideshow" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>

            </div>

            <div class="col-xl-2"></div>
        </div>
    </div>


@endsection
