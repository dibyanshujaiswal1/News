@extends('backend.master')
@section('title','Add Article')
@section('content')
<div class="container-full">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Article</h4>
                    </div>
                    @if(Session::has('message'))
                    <p style="color:green;text-align:center">{{Session::get('message')}}</p>
                    @endif
                    <form class="form-horizontal form-element" action="{{route('store.article')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Article Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Article Title" name="title">
                                    @error('title')
                                    <span style="color:red;text-align:center">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Article Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" placeholder="Enter Article Image" name="image">
                                    @error('image')
                                    <span style="color:red;text-align:center">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Auther Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Author Name" name="auther_name">
                                    @error('auther_name')
                                    <span style="color:red;text-align:center">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="description">Article Description</label>
                                <textarea name="description" class="form-control " id="description" placeholder="Article Description"></textarea>
                                @error('description')
                                <span>{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label for="title">Date</label>
                            <input type="date" class="form-control " name="date" id="exampleFirstName" placeholder="Article Date">
                            @error('date')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label for="featured" class="checkbox">
                                <input type="checkbox" name="is_features" id="featured" value="1" style="position: relative">
                                Features
                            </label>
                            @error('is_features')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-rounded btn-info pull-right">
                                Add Article
                            </button>
                            <a href="{{route('view.article')}}" class="btn btn-rounded"> Article List</a>
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