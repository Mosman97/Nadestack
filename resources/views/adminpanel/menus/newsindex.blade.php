@extends('adminpanel.templates.dashboardtemplate')
@section('content')
<div id="wrapper">
    @include('adminpanel.includes.adminpanel_sidenav')
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            @include('adminpanel.includes.adminpanel_rightmenu')

            {{ print_r($news['data']) }}







            <div class="container-fluid">
                <h3 class="text-dark mb-1" style="padding-bottom: 15px;">News</h3><button class="btn btn-primary" type="button">Create new article</button>
                <hr>

                @if( $news['data']!= NULL)

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



                            @for ($i = 0; $i < sizeof($news['data']); $i++)
                            <tr>
                                <td><input type="checkbox"></td>

                                <td> {{ $news['data'][$i]['news_id'] }}</td>
                                <td> {{ $news['data'][$i]['news_title'] }}</td>
                                <td> {{ $news['data'][$i]['news_author'] }}</td>
                                <td> TODO</td>
                                <td> {{ $news['data'][$i]['created_at'] }}</td>

                            </tr>


                            @endfor
                        </tbody>
                    </table>
                </div>
                <div id ="news_pagination"class="row mx-auto">
                    <div class="col-md-12 mx-auto text-center">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>

                @else 

                <div class=' text-center alert-warning'>
                    No Newsarticles Found in the Datbase
                </div>

                @endif
            </div>

        </div>
    </div>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
@endsection
