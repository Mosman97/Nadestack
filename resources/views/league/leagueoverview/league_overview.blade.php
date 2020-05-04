@extends('templates.league_default_template')

@section('content')
    <div class="col-xl-6 colum_content_big" style="background-color: #474B4F">
        <h1 class="text-center nadestack_heading_one nadestack-first-element"><img id='nav_logo' src='{{URL::asset('assets/img/logo.png')}}' width="60px"/>Nadestack League<img id='nav_logo' src='{{URL::asset('assets/img/logo.png')}}' width="60px"/></h1>
        <hr class="bg-light"/>
        <h2 class="text-center nadestack_heading_two">Make sure you are prepared</h2>
        <hr class="bg-light"/>
        <h2 class="text-center nadestack_heading_two">Time schedule - Season 1</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="main-timeline">
                    <div class="timeline">
                        <a href="#" class="timeline-content">
                            <span class="timeline-year">02.10.20</span>
                            <div class="timeline-icon">
                                <i class="fas fa-door-open"></i>
                            </div>
                            <h3 class="title">Anmeldung</h3>
                            <p class="description">Teams can sign in to the Nadestack league</p>
                        </a>
                    </div>
                    <div class="timeline">
                        <a href="#" class="timeline-content">
                            <span class="timeline-year">16.10.20</span>
                            <div class="timeline-icon">
                                <i class="fas fa-tasks"></i>
                            </div>
                            <h3 class="title">Planung</h3>
                            <p class="description">We are starting to organize the divisions</p>
                        </a>
                    </div>
                    <div class="timeline">
                        <a href="#" class="timeline-content">
                            <span class="timeline-year">24.10.20</span>
                            <div class="timeline-icon">
                                <i class="fas fa-sitemap"></i>
                            </div>
                            <h3 class="title">Ligaphase</h3>
                            <p class="description">The leaue is starting and you are able to play now</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text-center nadestack_heading_two">Find Division</h2>

        @yield('divisions')
    </div>

@endsection

