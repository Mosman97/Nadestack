<div class="col-xl-3 d-none d-lg-block" style="padding-top: 45px;">
    @auth
    @if(Auth::user()->verified == false)
        <div class="nadestack-league-widget">
            <div class="widget-title">
                <h3>Not verified!</h3>
            </div>
            <p>Your Nadestack account hasn't been verified yet. Without you won't be able to participate in our League! <br>To do so please click on the button to start your verification process. If you already did that and nothing happened,
                you can contact our support <a href="{{route('support')}}">here!</a></p>
            <div>
                <button class="btn btn-primary nadestack_btn" type="button">Verify</button>
            </div>
        </div>
    @elseif(Auth::user()->steamid == NULL)
        <div class="nadestack-league-widget">
            <div class="widget-title">
                <h3>Missing Gameaccount!</h3>
            </div>
            <p>Please verify your Steam Account. Without you won't be able to participate in our League!<br>To do so please go to your <a href="{{route('profilesettings')}}">profile settings</a> or click on the button below.
                If you any questions or problems, you can contact our support <a href="{{route('support')}}">here!</a> </p>
            <div>
                <a href="{{route('profilesettings')}}"><button class="btn btn-primary nadestack_btn" type="button">Verify</button></a>
            </div>
        </div>
    @elseif(Auth::user()->team_id != NULL)
        <h2 class="nadestack_heading_three font-weight-bold">Starter Division 27</h2>
        <div class="table-responsive">
            <table class="table nadestack-tbl table-sm table-borderless" style="color: white;">
                <thead style="background-color: #131517;">
                <tr>
                    <th>#</th>
                    <th>Team</th>
                    <th>Maps</th>
                    <th>Points</th>
                </tr>
                </thead>
                <tbody>
                <tr style="background-color: #303436">
                    <td>1</td>
                    <td><a href="">Deckengloter</a></td>
                    <td>4:2</td>
                    <td>6</td>
                </tr>
                <tr class="font-weight-bold">
                    <td>1</td>
                    <td><a href="">Deckengloter</a></td>
                    <td>4:2</td>
                    <td>6</td>
                </tr>
                <tr style="background-color: #303436;">
                    <td>2</td>
                    <td><a href="">Frechdachse</a></td>
                    <td>4:2</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><a href="">Big</a></td>
                    <td>2:4</td>
                    <td>3</td>
                </tr>
                <tr style="background-color: #303436;">
                    <td>3</td>
                    <td><a href="">Frechdachse</a></td>
                    <td>2:4</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><a href="">Big</a></td>
                    <td>1:5</td>
                    <td>2</td>
                </tr>
                <tr style="background-color: #303436">
                    <td>5</td>
                    <td><a href="">Astralis</a></td>
                    <td>1:5</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td><a href="">Astralis</a></td>
                    <td>1:5</td>
                    <td>0</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col">
            <h3 class="nadestack_heading_three font-weight-bold">Next Matches:</h3>
            <div class="row row-striped">
                <div class="col-2 text-right">
                    <h2 class="display-6"><span class="badge badge-secondary">23</span></h2>
                    <h4>Mar</h4>
                </div>
                <div class="col-10">
                    <h4 class="text-uppercase"><strong><a href="">Astralis</a></strong></h4>
                    <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Monday</li>
                        <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 12:30 PM - 2:00 PM
                        </li>
                        <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> League</li>
                        <li class="list-inline-item"><i class="fa fa-hashtag"></i> 2</li>
                    </ul>
                </div>
            </div>
            <div class="row row-striped">
                <div class="col-2 text-right">
                    <h2 class="display-6"><span class="badge badge-secondary">02</span></h2>
                    <h4>Apr</h4>
                </div>
                <div class="col-10">
                    <h4 class="text-uppercase"><strong><a href="">Astralis</a></strong></h4>
                    <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Monday</li>
                        <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 12:30 PM - 2:00 PM
                        </li>
                        <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> League</li>
                        <li class="list-inline-item"><i class="fa fa-hashtag"></i> 2</li>
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="nadestack-league-widget">
        <div class="widget-title">
            <h3>No active Season</h3>
        </div>
        <p>There is no active Nadestack Season going on right now! The next season will start at 23/10/2020. Please make
            sure that your Team is registered for the
            following season<br> Status: <span style="color: green">Registered for Season 1</span></p>
        <div>
            <button class="btn btn-primary nadestack_btn" type="button">Register</button>
        </div>
    </div>
    @endauth
</div>
