@extends('templates.league_default_template')

@section('content')
    <div class="col-xl-6 colum_content_big ">
                <h1 class="text-center nadestack_heading_one">League requierments</h1>
                <h2 class="text-center nadestack_heading_two">1. Connect your Account to steam</h2><label>In addition to play we need to know which Account you are using. You are also able to change your steam account later if you have any issues</label>
                <div class="row text-center">
                    <div class="col"><button class="btn btn-primary nadestack_btn" type="button">Connect to Steam</button></div>
                </div>
                <h2 class="text-center nadestack_heading_two">2. Make steam account public</h2>
                <label>We will check your steam account and want to see your hours in CS:GO and other information about games, steam level etc. Account needs to be public as long as you are not authorized for the Nadestack league<br /></label>
                <h2 class="text-center nadestack_heading_two">3. Verify with ID-Card</h2>
                <label>Every player is allowed to have only one Nadestack account. To avaoid smurfers you need to veriify with your ID-Card at our Partner -------.</label>
                <div class="row text-center" style="padding-bottom: 15px;">
                    <div class="col"><button class="btn btn-primary nadestack_btn" type="button">Verify</button></div>
                </div>
            </div>
@endsection
