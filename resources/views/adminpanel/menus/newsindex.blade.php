@extends('adminpanel.templates.dashboardtemplate')
@section('content')
<div id="wrapper">
    @include('adminpanel.includes.adminpanel_sidenav')





    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content" class="">
            @include('adminpanel.includes.adminpanel_rightmenu')
            <div class="container-fluid">
                @if(session('new_news_success'))


                <div class="alert alert-success" id='success-alert'>
                    {{ session('new_news_success') }}
                </div>

                <script>

                    $('document').ready(function (e) {


                        $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
                            $("#success-alert").slideUp(500);
                        });
                    });
                </script>
                @endif

                <h3 class="text-dark mb-1" style="padding-bottom: 15px;">News</h3>
                <a href="{{route('adminpanel_createnews')}}" class="btn btn-primary" role="button">Create new News</a>

                <hr>

                @if( $news!= NULL)
                <div class="row">
                    <div class="col">
                        <a href="#" style="padding-right: 30px;">All</a>
                        <a href="#" style="padding-right: 30px;">My articels</a>
                        <a href="#" style="padding-right: 30px;">Draft</a>
                        <a href="#" style="padding-right: 30px;">Archieved</a>
                    </div>
                    <div class=" col text-right">
                        <button type="button" class="btn btn-danger">Archive news</button>
                        <button type="button" class="btn btn-success">Publish news</button>
                    </div>
                </div>
                <div class="table-responsive"
                     style="padding-top: 10px;">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th></th>
                                <th>News-ID</th>
                                <th>Title</th>
                                <th>Autor</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Settings</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($news as $newsitem)
                            <tr id='{{ $newsitem->news_id }}'>
                                <td><input type="checkbox"></td>

                                <td> {{ $newsitem->news_id }}</td>
                                <td> {{ $newsitem->news_title }}</td>
                                <td> {{ $newsitem->news_author }}</td>
                                <td> TODO</td>
                                <td> {{ $newsitem->created_at }}</td>
                                <td><div class="btn-group"  style="margin-left:50px;"role="group" aria-label="Basic example">
                                        <button type="button"  class="btn btn-info">Edit</button>
                                        <button type="button" class="btn btn-danger">Archive</button>
                                    </div></td>

                            </tr>


                            @endforeach

                        </tbody>
                    </table>
                </div>

                @else

                <div class=' text-center alert-warning'>
                    No Newsarticles Found in the Datbase
                </div>

                @endif
            </div>



        </div>

        <div id="news_pagination" class="mx-auto">

            {{$news->render()}}

        </div>


    </div>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
@endsection
