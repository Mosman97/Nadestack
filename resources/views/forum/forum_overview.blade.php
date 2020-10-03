@extends('templates.default_template')

@section('content')
    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6 colum_content_big">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="wrapper wrapper-content">
                            <div class="ibox-content m-b-sm border-bottom" style="border-top: none;">
                                <div class="p-xs">
                                    <div class="pull-left m-r-md">
                                        <img id='nav_logo' src='{{URL::asset('assets/img/logo.png')}}' width="120px" style="float: left"/>
                                    </div>
                                    <h2>Welcome to the official Nadestack Forum!</h2>
                                    <span>Feel free to choose topic you're interested in.</span>
                                </div>
                            </div>


                            <div class="ibox-content forum-container">

                                <div class="forum-title">
                                    <div class="pull-right forum-desc" style="float: right">
                                        <samll>Total posts: {{$total_post}}</samll>
                                    </div>
                                    <h3>General subjects</h3>
                                </div>

                                @foreach($forum_category as $forum_category_entry)
                                @if($loop->iteration == 6)
                                    <div class="forum-title">
                                        <h3>Other subjects</h3>
                                    </div>
                                @endif
                                <div class="forum-item">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="forum-icon">
                                                <i class="{{$forum_category_entry->forum_category_icon}}"></i>
                                            </div>
                                            <a href='{{route('viewthreads',$forum_category_entry->forum_category_id)}}' class="forum-item-title">{{$forum_category_entry->forum_category_title}}</a>
                                            <div class="forum-sub-title">{{$forum_category_entry->forum_category_text}}</div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    1216
                                                </span>
                                            <div class="views-number-description">
                                                <small>Views</small>
                                            </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    {{$forum_category_entry->thread_count}}
                                                </span>
                                            <div class="views-number-description">
                                                <small>Topics</small>
                                            </div>
                                        </div>
                                        <div class="col-md-1 forum-info">
                                                <span class="views-number">
                                                    {{$forum_category_entry->post_count}}
                                                </span>
                                            <div class="views-number-description">
                                                <small>Posts</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3"></div>
            </div>
        </div>
    </div>
@endsection
