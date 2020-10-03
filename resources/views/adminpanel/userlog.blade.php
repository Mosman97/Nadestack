@extends('adminpanel.templates.dashboardtemplate')
@section('content')

    <h3>Adminlog</h3>

    <div class="table-responsive"
         style="padding-top: 10px;">
        <table class="table text-center">
            <thead>
            <tr>
                <th>Log-ID</th>
                <th>Query</th>
                <th>Date</th>
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
    </div>




    <div id="team_pagination" class="mx-auto nadestack-pagination">
        {{$logdata->render()}}
    </div>

@endsection
