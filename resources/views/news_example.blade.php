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
            <p class="text-left italic">Written: {{$news_metadata[0]['news_author']}}</p>
            <hr class="bg-light" />
            @if($news_metadata[0]['preview'] == 0)
            <div class="row">
                <div class="col-xl-12">
                    <div>
                        <div class="card" style="background-color: #333138;margin-bottom: 25px;">
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
                                                                <td class="text-left">#{{$loop->iteration}}</td>
                                                                <td class="text-right">{{$news_comment->created_at}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 text-center">
                                                    <h3>{{$news_comment->username}}</h3><img src="blob:file:///e19f558e-2561-4608-bac1-c8405d369d96" width="80px" height="80" /></div>
                                                <div class="col-md-6">
                                                    <p>{{$news_comment->comment}}</p>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                @endforeach
                                <h4 class="text-center">Add Comment</h4>
                                <form method="POST" action="{{route('StoreNewsComment', $news_metadata[0]['news_id'])}}" class="text-center">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col"><textarea id="comment" name="comment" class="form-control"></textarea></div>
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
