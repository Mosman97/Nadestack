@extends('adminpanel.templates.dashboardtemplate')
@section('content')

    <h3>Reports</h3>
    <hr>

    <div class="table-responsive" style="padding-top: 10px;">
        <table class="table  text-center" id="reports_table">
            <thead>
            <tr>
                <th>UserID</th>
                <th>Related Content</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($reports as $report)
                <tr id='{{ $report->report_id}}'>


                    <td> {{ $report->user_id }}</td>

                    @if ($report->forum_post_id == NULL)
                        <td>{{ $report->news_id }}</td>
                    @else
                        <td> {{ $report->forum_post_id }}</td>
                    @endif

                    <td> {{ $report->created_at }}</td>

                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <div id="user_pagination" class="mx-auto">
        {{$reports->render()}}
    </div>

@endsection
