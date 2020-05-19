@extends('adminpanel.templates.dashboardtemplate')
@section('content')



    @if(!empty($news_data))
    @foreach ($news_data as $news)

            @if(session('update_success'))


            <div class="alert alert-success" id='success-alert'>
                {{ session('update_success') }}
            </div>

            @endif

            <div class="container-fluid">
                <h1 class="text-dark mb-1">Create news</h1>
                <hr>
                <form method="POST" class=""action="{{route('adminpanel_updatenews','')}}/{{$news->news_id}}">

                    <div class="form-group row" style="padding-top: 5px; padding-bottom: 10px">
                        <label  class="col-sm-2 col-form-label">News-Heading</label>
                        <div class="col-sm-6">
                            <input type="text" name="news_heading" class="form-control"  value="{{$news->news_title}}"placeholder="Enter Newstitle" >
                        </div>
                    </div>
                    <div class="form-group row" style="padding-top: 5px; padding-bottom: 10px">
                        <label  class="col-sm-2 col-form-label">Sub-Heading</label>
                        <div class="col-sm-6">
                            <input type="text" name="news_subheading" class="form-control" value='{{$news->news_subheading}}' placeholder="Enter small title">
                        </div>
                    </div>
                    <hr>
                    @csrf
                    <h2 class="text-center" style="padding-bottom: 10px">News Content</h2>
                    @trix(\App\News::class, 'content')
                    <div style="padding-top: 20px">
                        <button class="text-center btn btn-success" style="margin-left: 25px">Preview</button>
                    </div>
                    <div style="padding-top: 20px">
                        <button class="text-center btn btn-success" style="margin-left: 25px">Update News</button>
                    </div>
                </form>
            </div>

    <script>

        /**
         * Decodes Sanitzed HTML to Plain HTML so that Trix can import the Text with ease
         */
        function htmlDecode(input) {
            var e = document.createElement('div');
            e.innerHTML = input;
            return e.childNodes[0].nodeValue;
        }
        var element = document.querySelector("trix-editor");


        element.editor.insertHTML(htmlDecode("{{$news->news_content}}"));

    </script>
    @endforeach

    @else

    {{--No Data is avaible so its a plain News Creating--}}

                <h1 class="text-dark mb-1">Create news</h1>
                <hr>
                <form method="POST" class=""action="{{route('adminpanel_storenews')}}">

                    <div class="form-group row" style="padding-top: 5px; padding-bottom: 10px">
                        <label  class="col-sm-2 col-form-label">News-Heading</label>
                        <div class="col-sm-6">
                            <input type="text" name="news_heading" class="form-control"  placeholder="Enter Newstitle" value=''>
                        </div>
                    </div>
                    <div class="form-group row" style="padding-top: 5px; padding-bottom: 10px">
                        <label  class="col-sm-2 col-form-label">Sub-Heading</label>
                        <div class="col-sm-6">
                            <input type="text" name="news_subheading" class="form-control" value='' placeholder="Enter small title">
                        </div>
                    </div>
                    <hr>
                    @csrf
                    <h2 class="text-center" style="padding-bottom: 10px">News Content</h2>
                    @trix(\App\News::class, 'content')
                    <div style="padding-top: 20px">
                        <button  name="action"value="create" id="create" type="submit" class="text-center btn btn-success" style="margin-left: 25px">create News</button>
                    </div>
                    <div style="padding-top: 20px">
                        <button name = "action" value="preview" id="preview" type="submit" class="text-center btn btn-success" style="margin-left: 25px">Preview</button>
                    </div>
                </form>
    @endif









<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
@endsection
