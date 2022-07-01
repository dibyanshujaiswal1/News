@extends('backend.master')
@section('title','Add Banner')
@section('content')
<div class="container-full">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Banner</h4>
                    </div>
                    @if(Session::has('message'))
                    <p style="color:green;text-align:center">{{Session::get('message')}}</p>
                    @endif
                    <form class="form-horizontal form-element" action="{{route('store.banner')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Banner Heading</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Category Name" name="banner_heading">
                                    @error('banner_heading')
                                    <span style="color:red;text-align:center">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Add Banner Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" placeholder="Enter Logo Image" name="banner_image">
                                    @error('banner_image')
                                    <span style="color:red;text-align:center">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label for="description">Banner Description</label>
                                    <textarea name="banner_description" class="form-control " id="description" placeholder="Banner Description"></textarea>

                                    @error('banner_description')
                                    <span>{{$message}}</span>
                                    @enderror
                                </div>
                        </div>
                        <div class="box-footer">

                            <button type="submit" class="btn btn-rounded btn-info pull-right">
                                Add Banner
                            </button>
                            <a href="{{route('view.banner')}}" class="btn btn-rounded"> Banner List</a>
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