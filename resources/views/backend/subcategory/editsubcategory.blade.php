
@extends('backend.master')
@section('content')
<div class="container-full">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Sub Category Update Form</h4>
                    </div>
                    <form class="form-horizontal form-element" action="{{route('update.Subcategory',$data->id)}}" method="post">
                        @csrf
                        <div class="box-body">
                        <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Category Type</label>
                                <div class="col-sm-10">
                                   <select  class="form-control" name="category_id" id="">
                                    <option value="">Select Category</option>
                                    @foreach($editcategory as $categories)
                                    <option value="{{$categories->id}}" {{$categories->id==$data->category_id?'selected':''}}>{{$categories->name}}</option>
                                    @endforeach
                                   </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Sub Category Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Sub Category Name" name="name" value="{{$data->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-rounded btn-info pull-right">
                                Update Sub Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>>
</div>
@endsection