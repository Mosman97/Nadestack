@extends('templates.default_template')

@section('content')
    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-3 "></div>
            <div class="col colum_content_big">
                <h1 class="text-center nadestack_heading_one">Nadestack League</h1>
                <h2 class="text-center nadestack_heading_two">Timetable</h2>
                <div class="table-responsive">
                    <table class="table nadestack-tbl">
                        <thead style="background-color: #BA2422; color: white;">
                        <tr>
                            <th>Date</th>
                            <th>Team</th>
                        </tr>
                        </thead>
                        <tbody style="background-color: #2A292E;">
                        <tr>
                            <td>100:23</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>100:23</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>23:100</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <h2 class="text-center nadestack_heading_two">Find Division</h2>
                <div class="row">
                    <div class="col">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Leagues</li>
                        </ul>

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">League</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Season 1</li>
                        </ul>

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">League</a></li>
                            <li class="breadcrumb-item"><a href="#">Season 1</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Starter Division</li>
                        </ul>
                    </div>
                </div>
            <div class="col-xl-3"></div>
        </div>
    </div>
@endsection
