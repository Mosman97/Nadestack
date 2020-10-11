@extends('adminpanel.templates.dashboardtemplate')
@section('content')

    <h3>Adminlog</h3>

        <table style="padding-top: 10px;" class="table text-center">
            <thead>
            <tr>
                <th style="width:5%">Log-ID</th>
                <th style="width:85%">Query</th>
                <th style="width:10%">Date</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($logdata as $log)
                <tr>
                    <td> {{ $log->id }}</td>
                    <td> {{ $log->query }}</td>
                    <td> {{$log->created_at}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>


    <div id="team_pagination" class="mx-auto nadestack-pagination">
        {{$logdata->render()}}
    </div>

@endsection
