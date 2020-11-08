@extends('adminpanel.templates.dashboardtemplate')
@section('content')

    <h3>League Overview</h3>

    @php
        //Ich denke da wir hier mit großem Content rechnen müssen fangen wir direkt an alles aufzuspalten
        //1 keine season
        //2 vor registrierung
        //3 registrierung
        //4 vor season
        //5 aktive season
    @endphp

    @switch($league_state)
        @case(1)
            @include('adminpanel.menus.league.startseason')
            @break

        @case(2)
            @include('adminpanel.menus.league.upcoming_season')
            @break

        @case(3)
            @include('adminpanel.menus.league.registration_stage')
            @break

        @case(4)
            @include('adminpanel.menus.league.reg_end')
            @break

        @case(5)
            @break
    @endswitch
@endsection
