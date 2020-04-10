@extends('league.leagueoverview.league_overview')

@section('divisions')
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb" style="background-color: #222629">
                    <li class="breadcrumb-item active" aria-current="page" style="color: #86C232">League</li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table nadestack-tbl table-sm table-borderless">
                    <thead>
                    <tr>
                        <td>Time</td>
                        <td>Season</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr style="background-color: #303436">
                        <td>05.03.2020 - 05-30-20</td>
                        <td><a href="leagueoverview_season.html">Season 1</a></td>
                    </tr>
                    <tr>
                        <td>05.03.2020 - 05-30-20</td>
                        <td><a href="leagueoverview_season.html">Season 1</a></td>
                    </tr>
                    <tr style="background-color: #303436">
                        <td>05.03.2020 - 05-30-20</td>
                        <td><a href="leagueoverview_season.html">Season 1</a></td>
                    </tr>
                    <tr>
                        <td>05.03.2020 - 05-30-20</td>
                        <td><a href="leagueoverview_season.html">Season 1</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
