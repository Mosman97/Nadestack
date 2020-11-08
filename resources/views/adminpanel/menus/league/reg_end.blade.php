<h4>Registration for {{$active_season->name}} ended!</h4>

<p>Season start: {{$active_season->season_start}}</p>
<p>Season end: {{$active_season->season_end}}</p>
<p>Team limit: {{$active_season->team_limit}}</p>

<div class="row">
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-left-primary py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2">
                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Players</span></div>
                        <div class="text-dark font-weight-bold h5 mb-0"><span>{{$active_season->registered_players}}</span></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-user fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-left-success py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col mr-2">
                        <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Teams</span></div>
                        <div class="text-dark font-weight-bold h5 mb-0"><span>{{$active_season->registered_teams}}</span></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-users fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
