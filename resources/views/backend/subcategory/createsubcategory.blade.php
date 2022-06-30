
@extends('backend.master')
@section('title','Add Sub Category')
@section('content')
<div class="container-full">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Sub Category Add Form</h4>
                    </div>
                    @if(Session::has('message'))
                    <p style="color:green;text-align:center">{{Session::get('message')}}</p>
                    @endif
                    <form class="form-horizontal form-element" action="{{route('store.subcategory')}}" method="post">
                        @csrf
                        <div class="box-body">
                        <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Category Type</label>
                                <div class="col-sm-10">
                                   <select  class="form-control" name="category_id" id="">
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
                                <label for="inputEmail3" class="col-sm-2 control-label">Sub Category Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Sub Category Name" name="name">
                                    @error('name')
                                    <span style="color:red;text-align:center">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">

                            <button type="submit" class="btn btn-rounded btn-info pull-right">
                                Add Sub Category
                            </button>
                            <a href="{{route('view.subcategory')}}" class="btn btn-rounded"> Sub Category List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>>
</div>
@endsection