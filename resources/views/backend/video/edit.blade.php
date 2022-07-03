@extends('backend.master')
@section('title','Add Article')
@section('content')
<div class="container-full">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Update Video</h4>
                    </div>
                    <form class="form-horizontal form-element" action="{{route('update.video',$data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Videp Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Article Title" name="title" value="{{$data->title}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Thumbnail Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" placeholder="Add Image for THhumbnails" name="thumbnails_image">
                                    <img src="{{asset('backend/img/video/'.$data->thumbnails_image)}}" alt="" width="300" height="200">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Video URL</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Add Video URL" name="video_url" value="{{$data->video_url}}">
                                </div>
                            </div>
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="description">Video Description</label>
                                <textarea name="description" class="form-control " id="description" placeholder="Video Description" value="$data->description">{{$data->description}}</textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-rounded btn-info pull-right">
                                Update Video
                            </button>
                            <a href="{{route('view.video')}}" class="btn btn-rounded"> Video List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>>
</div>
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endsection