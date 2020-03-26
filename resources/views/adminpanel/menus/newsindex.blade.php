@extends('adminpanel.templates.dashboardtemplate')
@section('content')
<div id="wrapper">
    @include('adminpanel.includes.adminpanel_sidenav')
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content" class="">
            @include('adminpanel.includes.adminpanel_rightmenu')
            <div class="container-fluid">
                <h3 class="text-dark mb-1" style="padding-bottom: 15px;">News</h3>
                <a href="{{route('adminpanel_createnews')}}" class="btn btn-primary" role="button">Create new News</a>
          
                <hr>

                @if( $news!= NULL)

                <div>
                    <a href="#" style="padding-right: 30px;">All</a>
                    <a href="#" style="padding-right: 30px;">My articels</a>
                    <a href="#" style="padding-right: 30px;">Draft</a>
                    <a href="#" style="padding-right: 30px;">Archieved</a>
                </div>
                <div class="table-responsive"
                     style="padding-top: 10px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>News-ID</th>
                                <th>Title</th>
                                <th>Autor</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($news as $newsitem)
                            <tr>
                                <td><input type="checkbox"></td>

                                <td> {{ $newsitem->news_id }}</td>
                                <td> {{ $newsitem->news_title }}</td>
                                <td> {{ $newsitem->news_author }}</td>
                                <td> TODO</td>
                                <td> {{ $newsitem->created_at }}</td>

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
