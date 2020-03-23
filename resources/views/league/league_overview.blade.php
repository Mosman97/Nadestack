@extends('templates.default_template')

@section('content')
    <div class="container-fluid nadestack_body" style="background-color: #222629">
        <div class="row">
            <div class="col-xl-3 "></div>
            <div class="col-xl-6 colum_content_big" style="background-color: #474B4F">
                <h1 class="text-center nadestack_heading_one"><img id='nav_logo' src='{{URL::asset('assets/img/logo.png')}}' width="60px"/>Nadestack League</h1>
                <hr style="background-color: #222629; height:1px; border:none;color: #222629 "/>
                <h2 class="text-center nadestack_heading_two">Timetable - Season 1</h2>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table nadestack-tbl">
                                <thead style="background-color: #6B6E70; color: white;">
                                <tr>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody style="background-color: #6B6E70;">
                                <tr>
                                    <td>05-03-20 - 05-09-20</td>
                                    <td>Week 1</td>
                                </tr>
                                <tr>
                                    <td>05-10-20 - 05-16-20</td>
                                    <td>Week 2</td>
                                </tr>
                                <tr>
                                    <td>05-17-20 - 05-23-20</td>
                                    <td>Week 3</td>
                                </tr>
                                <tr>
                                    <td>05-24-20 - 05-30-20</td>
                                    <td>Week 4</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <h2 class="text-center nadestack_heading_two">Find Division</h2>
                <div class="row">
                    <div class="col">
                        <ul class="breadcrumb" style="background-color: #222629">
                            <li class="breadcrumb-item"><a href="#">League</a></li>
                            <li class="breadcrumb-item"><a href="#">Season 1</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color: #86C232">Starter Division</li>
                        </ul>
                    </div>
                </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
