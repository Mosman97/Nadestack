@extends('adminpanel.templates.dashboardtemplate')
@section('content')


<h3 class="text-dark mb-1 text-center" style="padding-bottom: 15px;">Player-Overview</h3>
<!--<a href="{{route('adminpanel_createnews')}}" class="btn btn-primary" role="button">Create new News</a>-->

<hr>

<div class="row text-center justify-content-center">

    <div class="col-md-6">

        <form class="form navbar-search">
            <div class="input-group">
                <input class="bg-white form-control border-0 small" type="text"placeholder="Search Playername or Player-ID in Database">
                <div class="input-group-append">
                    <button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="user_pagination" class="mx-auto">

    {{$users->render()}}
</div>



@endsection