@extends('templates.default_template')

@section('content')
    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6 colum_content_big  flex-column">
                <div class="row">
                    <div class="col">
                        <div class="nadestack-thread-heading nadestack-first-element">
                            <i class="fa fa-shield-alt nadestack-thread-icon"></i>
                            <h1>League Problems</h1>
                        </div>
                    </div>
                </div>
                <div class="nadestack-line"></div>
                <div class="row">
                    <div class="col">
                        @auth
                            <a class="btn nadestack_btn" href="{{route('createthread')}}" style="background-color: #86C232; margin-bottom: 8px">Create thread <i class="fa fa-file-alt"></i> </a>
                        @endauth
                        <div class="table-responsive">
                            <table class="table nadestack-tbl table-borderless">
                                <thead>
                                <tr>
                                    <th>Topic</th>
                                    <th>Replies</th>
                                    <th>Author</th>
                                    <th></th>
                                    <th>Activity</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr style="background-color: #404448">
                                    <td><a href="https://liga.99damage.de/de/users/703337-luke_1337">Warum ist Eric ein Ossi?</a> </td>
                                    <td>200</td>
                                    <td><a href="https://liga.99damage.de/de/users/703337-luke_1337" style="margin-right: 5px;">Luke_1337</a></td>
                                    <td><img class="rounded-circle" src="../assets/img/profile_pictures/syn.png" width="30px" height="30px"></td>
                                    <td>2 Seconds ago</td>
                                </tr>
                                <tr>
                                    <td><a href="https://liga.99damage.de/de/users/703337-luke_1337">Warum ist der Trommler so ein krasser Typ?</a> </td>
                                    <td>200</td>
                                    <td><a href="https://liga.99damage.de/de/users/703337-luke_1337" style="margin-right: 5px;">Luke_1337</a></td>
                                    <td><img class="rounded-circle" src="../assets/img/profile_pictures/syn.png" width="30px" height="30px"></td>
                                    <td>3 Hours ago</td>
                                </tr>
                                <tr style="background-color: #404448">
                                    <td><a href="https://liga.99damage.de/de/users/703337-luke_1337">Einfach einen Köftespieß</a> </td>
                                    <td>200</td>
                                    <td><a href="https://liga.99damage.de/de/users/703337-luke_1337" style="margin-right: 5px;">Kolbstraße</a></td>
                                    <td><img class="rounded-circle" src="../assets/img/profile_pictures/syn.png" width="30px" height="30px"></td>
                                    <td>1 Month ago</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--<div class="d-flex justify-content-center nadestack-pagination mt-auto" style="padding-top: 10px"></div>-->
                <div class="d-flex justify-content-center nadestack-pagination mt-auto" style="padding-top: 10px">
                    <nav>
                        <ul class="pagination Nadestack-pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-xl-3"></div>
        </div>
    </div>
@endsection
