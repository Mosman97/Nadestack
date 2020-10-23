@extends('templates.default_template')

@section('content')
    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col colum_content_small">
                <h1 class="text-center nadestack_heading_one">Create new thread</h1>
                <div class="row text-center">
                    <div class="col">
                        <form method="POST" action="{{route('newthread',$forum_category_id)}}">
                            @csrf
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-6">
                                    <input type="text" name="thread-title" class="form-control"  placeholder="Enter Title" value=''>
                                </div>
                            </div>
                            <div class="form-group row">
                                @error('thread-title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Text</label>
                                <div class="col-sm-6">
                                    <textarea name="thread-text" class="form-control" style="height: 250px"  placeholder="Enter your Text here" value=''></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                @error('thread-text')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- @trix(\App\News::class, 'content') -->
                            <div style="margin-top: 10px">
                                <button class="text-center nadestack_btn btn" type="submit">Create Thread</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-3"></div>
        </div>
    </div>
@endsection
