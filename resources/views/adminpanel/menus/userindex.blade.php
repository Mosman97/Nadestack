@extends('adminpanel.templates.dashboardtemplate')
@section('content')

    <h3 class="text-dark mb-1" style="padding-bottom: 15px;">Users</h3>
    <hr>

    <div class="row">
        <div class="col">
            <a href="#" style="padding-right: 30px;">All</a>
            <a href="#" style="padding-right: 30px;">Player</a>
            <a href="#" style="padding-right: 30px;">Penalty</a>
            <a href="#" style="padding-right: 30px;">Banned</a>
        </div>
    </div>

    <div class="table-responsive"
         style="padding-top: 10px;">
        <table class="table  text-center" id="news_table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Team</th>
                <th>Last logged in</th>
                <th>Joined</th>
                <th>Buttons</th>
            </tr>
            </thead>
            <tbody>
            <tr id=''>
                <td> Name</td>
                <td> Team</td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div id="user_pagination" class="mx-auto">

        TODO

    </div>

@endsection
