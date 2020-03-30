@extends('templates.default_template')

@section('content')
    <div class="container-fluid nadestack_body" style="background-color: #222629">
        <div class="row">
            <div class="col-xl-3 "></div>
            <div class="col-xl-6 colum_content_big" style="background-color: #474B4F">
                <h1 class="text-center nadestack_heading_one"><img id='nav_logo' src="assets/img/logo.png" width="60px"/>Nadestack League</h1>
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
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb" style="background-color: #222629">
                                <li class="breadcrumb-item"><a href="seasonoverview.html">League</a></li>
                                <li class="breadcrumb-item"><a href="leagueoverview_season.html">Season 1</a></li>
                                <li class="breadcrumb-item active" aria-current="page" style="color: #86C232">Starter Division</li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <ul class="nadestack-division division-groups">
                            <li><a href="#">Starter Division 1</a></li>
                            <li><a href="#">Starter Division 2</a></li>
                            <li><a href="#">Starter Division 3</a></li>
                            <li><a href="#">Starter Division 4</a></li>
                            <li><a href="#">Starter Division 5</a></li>
                            <li><a href="#">Starter Division 6</a></li>
                            <li><a href="#">Starter Division 7</a></li>
                            <li><a href="#">Starter Division 8</a></li>
                            <li><a href="#">Starter Division 9</a></li>
                            <li><a href="#">Starter Division 10</a></li>
                            <li><a href="#">Starter Division 11</a></li>
                            <li><a href="#">Starter Division 12</a></li>
                            <li><a href="#">Starter Division 13</a></li>
                            <li><a href="#">Starter Division 14</a></li>
                            <li><a href="#">Starter Division 15</a></li>
                            <li><a href="#">Starter Division 16</a></li>
                            <li><a href="#">Starter Division 17</a></li>
                            <li><a href="#">Starter Division 18</a></li>
                            <li><a href="#">Starter Division 19</a></li>
                            <li><a href="#">Starter Division 20</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
