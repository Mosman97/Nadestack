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

      

                @elseif (session('news_delete'))


                <div class="alert alert-success" id='success-alert'>
                    {{ session('news_delete') }}
                </div>

                @endif

                <h3 class="text-dark mb-1" style="padding-bottom: 15px;">News</h3>
                <a href="{{route('adminpanel_createnews')}}" class="btn btn-primary" role="button">Create new News</a>

                <hr>

                @if( $news!= NULL)

                <script>

                    $('document').ready(function (e) {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        });




                        var selected_row = null;

                        $('#news_table >tbody >tr > td > input').on('click', function (e) {

                            if ($(this).prop('checked')) {


                                //Getting Row ID
                                selected_row = $(this).parent().parent().attr("id");



                                //Enable Buttons 
                                $(this).parent().parent().find("td:last").find("button").prop('disabled', false);

                                $(this).parent().parent().addClass("news_select_highlightning");

                            } else {

                                //Disbale Buttons
                                $(this).parent().parent().find("td:last").find("button").prop('disabled', true);

                                $(this).parent().parent().removeClass("news_select_highlightning");

                                //Reset selected row

                                selected_row = null;
                            }


                        });


                        /**
                         * Handles the Click if a News has to bee deleted
                         */
                        $('#delete_news_btn').on('click', function (e) {

                            //    console.log(selected_row);

                            $.ajax({
                                type: 'POST',
                                url: "{{route('adminpanel_deltenews','')}}/" + selected_row,
                                data: {_token: "{{ csrf_token() }}"
                                },
                                dataType: 'json',
                                success: function (msg) {

                                    console.log(msg);

                                    if (msg) {

                                        location.reload();
                                    }
                                }
                            });


                        });
                    });

                </script>
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
                    <table class="table  text-center" id="news_table">
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
                                        <button type="button" disabled="true" class="btn btn-info">Edit</button>
                                        <div class="divider"></div>
                                        <button type="button" disabled="true"class="btn btn-success">Archive</button>
                                        <div class="divider"></div>
                                        <button type="button" disabled="true"class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</button>
                                    </div>
                                </td>

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


        <!-- Delete Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete News</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Do you really want to delete the selected News?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="delete_news_btn" class="btn btn-danger" >Delete News</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>


          <script>

                    $('document').ready(function (e) {


                        $("#success-alert").fadeTo(1000, 500).slideUp(500, function () {
                            $("#success-alert").slideUp(500);
                        });
                    });



                </script>
@endsection
