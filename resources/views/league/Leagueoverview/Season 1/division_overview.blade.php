@extends('league.Leagueoverview.league_overview')

@section('divisions')
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb" style="background-color: #222629">
                    <li class="breadcrumb-item"><a href="seasonoverview.html">League</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: #86C232">Season 1</li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <ul class="nadestack-division divisions">
                <li><a href="#">Pro Division </a></li>
                <li><a href="#">Division 1</a></li>
                <li><a href="#">Division 2</a></li>
                <li><a href="#">Division 3</a></li>
                <li><a href="#">Division 4</a></li>
                <li><a href="divisionoverview.html">Starter Division</a></li>
            </ul>
        </div>
    </div>
@endsection
