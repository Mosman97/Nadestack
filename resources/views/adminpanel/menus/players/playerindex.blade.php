@extends('adminpanel.templates.dashboardtemplate')
@section('content')


<script>

    $('document').ready(function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var selected_row = null;

        $('#player_table >tbody >tr > td > input').on('click', function (e) {

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

        /**
         * Search Logic
         */


        $(document).on('keyup', '#player_search', function () {
            //stuff happens
            console.log("key");

            $.ajax({
                type: 'GET',
                url: "{{route('adminpanel_playerindex')}}",
                data: {_token: "{{ csrf_token() }}",search_input:$('#player_search').val()
                },
                dataType: 'json',
                success: function (msg) {
                    
                    
                    $('#player_table >tbody').html("");


            
                },
                error:function(e){
                    
                   console.log(e);
                }
            });


        });




    });




</script>


<h3 class="text-dark mb-1 text-center" style="padding-bottom: 15px;">Player-Overview</h3>

<hr>


<div class="row text-center justify-content-center">

    <div class="col-md-6">

        <form class="form navbar-search">
            <div class="input-group">
                <input class="bg-white form-control border-0 small" id="player_search" type="text"placeholder="Search Playername or Player-ID in Database">
                <div class="input-group-append">
                    <button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
<hr>

<div class="row">
    <div class="col">
        <a href="#" style="padding-right: 30px;">All</a>
        <a href="#" style="padding-right: 30px;">Sort by Date</a>
        <a href="#" style="padding-right: 30px;">Sort by Username</a>
        <a href="#" style="padding-right: 30px;">Sort by Status</a>
    </div>
    <div class=" col text-right">
        <button type="button" class="btn btn-danger">Ban User</button>
    </div>
</div>

<div class="table-responsive"
     style="padding-top: 10px;">
    <table class="table  text-center" id="player_table">
        <thead>
            <tr>
                <th></th>
                <th>User-ID</th>
                <th>Username</th>
                <th>Team</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
            <tr id='{{ $user->id}}'>
                <td><input type="checkbox"></td>

                <td> {{ $user->id }}</td>
                <td> {{$user->username}}</td>

                @if ($user->team_id == NULL)

                <td>No Team</td>

                @else
                <td> {{ $user->team_name }}</td>
                @endif

                <td> TODO</td>
                <td> {{ $user->created_at }}</td>
                <td><div class="btn-group"  style="margin-left:50px;"role="group" aria-label="Basic example">
                        <button type="button" disabled="true" class="btn btn-info" id='player_edit_btn'>Edit Player</button>
                        <div class="divider"></div>
                        <button type="button" disabled="true"class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Ban Player</button>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>







<div id="user_pagination" class="mx-auto">

    {{$users->render()}}
</div>


<!-- Ban Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Banoptions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <h6 class="text-center">Timeout-Option</h6>
                    <div class="form-group row">
                        <label for="timeout_value" class="col-4 col-form-label">Timeout:</label> 
                        <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-calendar-times-o"></i>
                                    </div>
                                </div> 
                                <input id="timeout_value" name="timeout_value" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h6 class="text-center">Permaban-Option</h6>

                    <div class="form-group row">
                        <label class="col-4">Permaban:</label> 
                        <div class="col-8">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="checkbox" id="checkbox_0" type="checkbox" class="custom-control-input" value="permaban" aria-describedby="checkboxHelpBlock"> 
                                <label for="checkbox_0" class="custom-control-label">Perman Player</label>
                            </div> 
                        </div>
                    </div> 
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="delete_news_btn" class="btn btn-danger" >Perform Action</button>
            </div>
        </div>
    </div>
</div>




@endsection