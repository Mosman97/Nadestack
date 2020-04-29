@extends('adminpanel.templates.dashboardtemplate')
@section('content')

    <h2 class="text-center nadestack_heading_two nadestack-first-element">Tasks Overview</h2>
    <a href="#" class="btn btn-primary" role="button">Create new Task</a>
    <hr>

    <div class="table-responsive" style="padding-top: 10px;">
        <table class="table text-center" id="task_table">
            <thead>
            <tr>
                <th>Task-ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            </tbody>
        </table>
    </div>

    <div id="tasks_pagination" class="mx-auto">
        {{$tasks->render()}}
    </div>

@endsection
