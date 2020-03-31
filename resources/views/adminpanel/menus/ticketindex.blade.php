@extends('adminpanel.templates.dashboardtemplate')
@section('content')

    <h3 class="text-dark mb-1" style="padding-bottom: 15px;">Tickets</h3>
    <hr>

    <div class="row">
        <div class="col">
            <a href="#" style="padding-right: 30px;">Open</a>
            <a href="#" style="padding-right: 30px;">Closed</a>
            <a href="#" style="padding-right: 30px;">Important</a>
            <a href="#" style="padding-right: 30px;">All</a>
        </div>
    </div>

    <div class="table-responsive"
         style="padding-top: 10px;">
        <table class="table  text-center" id="news_table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>User</th>
                <th>Last Update</th>
                <th>Created</th>
                <th>Buttons</th>
            </tr>
            </thead>
            <tbody>
                <tr id=''>
                    <td> Title</td>
                    <td> Status</td>
                    <td> User</td>
                    <td> Last Answer</td>
                    <td> Created</td>
                    <td> Buttons</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="ticket_pagination" class="mx-auto">

        TODO

    </div>

@endsection
