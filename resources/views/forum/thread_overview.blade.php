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
                            <a class="btn nadestack_btn" href="{{route('createthread',$forum_category_id)}}" style="background-color: #86C232; margin-bottom: 8px">Create thread <i class="fa fa-file-alt"></i> </a>
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
                                @foreach($forum_thread as $forum_thread_entry)
                                <tr style="background-color: #404448">
                                    <td><a href="{{route('viewthread',['forum_category_id'=>$forum_category_id,'forum_thread_id'=>$forum_thread_entry->forum_thread_id])}}">{{$forum_thread_entry->forum_thread_title}}</a> </td>
                                    <td>200</td>
                                    <td><a href="https://liga.99damage.de/de/users/703337-luke_1337" style="margin-right: 5px;">{{$forum_thread_entry->forum_thread_author}}</a></td>
                                    <td><img class="rounded-circle" src="../assets/img/profile_pictures/syn.png" width="30px" height="30px"></td>
                                    <td>{{$forum_thread_entry->created_at}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center nadestack-pagination mt-auto " style="padding-top: 10px"></div>
            </div>
            <div class="col-xl-3"></div>
        </div>
    </div>
@endsection
