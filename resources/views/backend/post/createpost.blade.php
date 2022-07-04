@extends('backend.master')
@section('title','Add Post')
@section('content')
<div class="container-full">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Post</h4>
                    </div>
                    @if(Session::has('message'))
                    <p style="color:green;text-align:center">{{Session::get('message')}}</p>
                    @endif
                    <form class="form-horizontal form-element" action="{{route('store.post')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Category Type</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="category_id" id="">
                                        <option value="">Select category</option>
                                        @foreach($category as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span style="color:red;text-align:center">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Sub Category Type</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="sub_category_id" id="">
                                        <option value="">Select category</option>
                                        @foreach($sub_category as $sub_category)
                                        <option value="{{$category->id}}">{{$sub_category->name}}</option>
                                        @endforeach
                                    </select>
                                   
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Post Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Post Name" name="post_name">
                                    @error('post_name')
                                    <span style="color:red;text-align:center">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Sub Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Sub Title" name="sub_title">
                                    @error('sub_title')
                                    <span style="color:red;text-align:center">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Post Tag</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Post Tag" name="post_tag">
                                  
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Main Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" placeholder="Enter Article Image" name="main_image">
                                    @error('main_image')
                                    <span style="color:red;text-align:center">{{$message}}</span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Relatives Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="relatives_image[]" multiple class="form-control">
                                   
                                </div>
                            </div>
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control " id="description" placeholder="Post Description"></textarea>
                                @error('description')
                                <span>{{$message}}</span>
                                @enderror
                            </div><br>
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="featured" class="checkbox">Choose Type:<br>
                                    <input type="checkbox" name="headline" id="featured" value="1" style="position: relative">
                                    Headlines
                                    <input type="checkbox" name="mainnews" id="featured" value="1" style="position: relative">
                                    MainNews
                                    <input type="checkbox" name="is_features" id="featured" value="1" style="position: relative">
                                    Features
                                </label>
                               
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-rounded btn-info pull-right">
                                Add Post
                            </button>
                            <a href="{{route('view.subcategory')}}" class="btn btn-rounded"> Post List</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
</section>>
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endsection