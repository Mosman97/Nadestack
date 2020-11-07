@extends('adminpanel.templates.dashboardtemplate')
@section('content')

    <h3>League Overview</h3>

    @php
        //Ich denke da wir hier mit großem Content rechnen müssen fangen wir direkt an alles aufzuspalten
    @endphp

    @if($start_league == 1)
        @include('adminpanel.menus.league.startseason')
    @endif
@endsection
