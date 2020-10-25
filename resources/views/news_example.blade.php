@extends('templates.default_template')

@section('content')

<div class="container-fluid nadestack_body">
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col-xl-6 colum_content_big">
            <h4 class="nadestack_heading_four nadestack-first-element text-left">{{$news_metadata[0]['news_subheading']}}</h4>
            <h1 class="text-left">{{$news_metadata[0]['news_title']}}</h1>
            @if($news_metadata[0]['preview'] == 1)
                <p>{!!$news_metadata[0]['news_content']['content']!!}</p>
            @else
                <p>{!!$news_metadata[0]['news_content']!!}</p>
            @endif
            <p class="text-left italic">Written by {{$news_metadata[0]['news_author']}}</p>
            <hr class="bg-light" />
            @if($news_metadata[0]['preview'] == 0)
            <div class="row">
                <div class="col-xl-12">
                    <div>
                        <div class="card" style="background-color: #222629;margin-bottom: 25px;">
                            <div class="card-header">
                                <h5 class="text-center mb-0">Comments</h5>
                            </div>
                            <div class="card-body">
                                @foreach($news_comments as $news_comment)
                                <div class="row">
                                    <ul class="col-md-12" style="  list-style: none;">
                                        <li>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-borderless comment_header">
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-left">#{{$loop->iteration + $news_comments-> perPage() * ($news_comments-> currentPage() - 1) }}</td>
                                                                <td class="text-right">{{$news_comment->created_at}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3" style="margin-left: 15px">
                                                    <a href="{{route('startpage')}}/user/{{$news_comment->username}}">
                                                        <img class="rounded-circle" style="width:80px; height:80px; margin-bottom: 10px;" src="{{URL::asset('assets/img/profile_pictures/')}}/{{$news_comment->avatar_url}}">
                                                    </a>
                                                    <a href="{{route('startpage')}}/user/{{$news_comment->username}}">
                                                    <p>{{$news_comment->username}}</p>
                                                    </a>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>{{$news_comment->comment}}</p>
                                                </div>
                                                <div class="col-md-3"></div>
                                                @auth
                                                    <div class="col text-right"><button class="reportPost" id="r" data-toggle="modal" data-target="#modalReport" type="button" style="color: white; height: 17px; font-size: smaller; background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; outline:none;">Melden</button></div>
                                                @endauth
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                @endforeach
                                <div class="d-flex justify-content-center nadestack-pagination mt-auto " style="padding-top: 10px" id="news_paginator">{{$news_comments->render()}}</div>
                                <h4 class="text-center">Add Comment</h4>
                                <form method="POST" action="{{route('StoreNewsComment', $news_metadata[0]['news_id'])}}" class="text-center">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col"><textarea id="comment" name="comment" required maxlength="10000" class="form-control"></textarea></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col"><button class="btn btn-primary nadestack_btn" id="comment_submit_btn" type="submit">Submit Comment</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="col d-none d-lg-block" style='margin-top: 50px;'><a class="twitter-timeline" data-height="600" data-theme="light" href="https://twitter.com/99DAMAGEde?ref_src=twsrc%5Etfw">Tweets by 99DAMAGEde</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div>
        <div class="col-xl-3"></div>
    </div>
</div>
@endsection
<script>
    $(document).on("click", ".reportPost", function () {
        var postid = $(this).attr('id');

        while(postid.charAt(0) === 'r')
        {
            postid = postid.substr(1);
        }

        $("#idreport").val( postid );
    });
</script>
<!-- modaler dialog für user zum reporten -->
<div class="modal fade" id="modalReport" tabindex="-1" role="dialog" aria-hidden="true" style="color: white">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #474B4F; font-family: 'Roboto';">
            <form action="#"  method="POST">
                @csrf
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Report User Message</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input class="invisible" name="idreport" id="idreport" value="">
                <div class="modal-body mx-3">
                    <div class="md-form mb-5 text-center">
                        <label data-error="wrong" data-success="right" for="message">Leave a comment to the report</label>
                        <textarea name="report_message" rows="10" type="text" id="message" class="form-control validate"></textarea>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-danger" type="submit">Report Message</button>
                </div>
            </form>
        </div>
    </div>
</div>
