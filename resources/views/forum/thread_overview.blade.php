@extends('templates.default_template')

@section('content')
    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6 colum_content_big  flex-column">
                <div class="row">
                    <div class="col">
                        <div class="nadestack-thread-heading nadestack-first-element">
                            <i class="{{$category_data->forum_category_icon}} nadestack-thread-icon"></i>
                            <h1>{{$category_data->forum_category_title}}</h1>
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
                                    <th></th>
                                    <th>Topic</th>
                                    <th>Replies</th>
                                    <th>Author</th>
                                    <th></th>
                                    <th>Last reply</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($forum_thread as $forum_thread_entry)

                                    @if($loop->odd)
                                    <tr style="background-color: #404448">
                                    @else
                                    <tr>
                                    @endif

                                        @if($forum_thread_entry->is_closed)
                                        <td><i class="fas fa-lock"></i></td>
                                        @else
                                        <td></td>
                                        @endif

                                        <td><a href="{{route('viewthread',['forum_category_id'=>$forum_category_id,'forum_thread_id'=>$forum_thread_entry->forum_thread_id])}}">{{$forum_thread_entry->forum_thread_title}}</a> </td>
                                        <td>{{$forum_thread_entry->post_count - 1}}</td>
                                        <td><a href="https://liga.99damage.de/de/users/703337-luke_1337" style="margin-right: 5px;">{{$forum_thread_entry->username}}</a></td>
                                        <td><img class="rounded-circle" src="{{URL::asset('assets/img/profile_pictures/')}}/{{$forum_thread_entry->avatar_url}}" width="30px" height="30px"></td>
                                        <td>{{$forum_thread_entry->updated_at}}</td>
                                    </tr>
                                    @endforeach
                                    <div class="d-flex justify-content-center nadestack-pagination mt-auto " style="padding-top: 10px">{{$forum_thread->render()}}</div>

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
