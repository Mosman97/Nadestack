@extends('adminpanel.templates.dashboardtemplate')
@section('content')




<h3 class="text-dark mb-1 text-center" style="padding-bottom: 15px;">Player-Overview</h3>
<a href="{{route('adminpanel_createnews')}}" class="btn btn-primary" role="button">Create new News</a>

<hr>



<div id="user_pagination" class="mx-auto">

    {{$users->render()}}
</div>



@endsection