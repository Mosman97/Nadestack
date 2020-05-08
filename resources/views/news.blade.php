@extends('templates.default_template')

@section('content')


<div class="container-fluid nadestack_body">
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col-xl-6 colum_content_big d-flex  flex-column">
            <div id="news_container">

                @foreach($news as $news_entry)

                <div class="row" style="margin-top: 5px">
                    <div class="col">
                        <div class="row">
                            <p class="col text-left" style="margin-left: 15px; color: #FF312E">{{$news_entry->news_title}}</p>
                            <p class="col text-right" style="margin-right: 10px;">{{$news_entry->created_at}}</p>
                        </div>
                        <h3 class="text-left" style="padding-left: 15px;">{{$news_entry->news_subheading}}</h3>
                        <p class="text-left" style="padding-left: 15px;">{!!$news_entry->news_content!!}</p>
                    </div>
                </div>
                <div class="border-white" id="news_container"></div>

                @endforeach

            </div>

            <div class="d-flex justify-content-center nadestack-pagination mt-auto " style="padding-top: 10px" id="news_paginator">{{$news->render()}}</div>



        </div>
        <div class="col d-none d-lg-block" style='margin-top: 50px;'><a class="twitter-timeline" data-height="600" data-theme="light" href="https://twitter.com/99DAMAGEde?ref_src=twsrc%5Etfw">Tweets by 99DAMAGEde</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div>
        <div class="col-xl-3">
        </div>
    </div>
</div>
@endsection
