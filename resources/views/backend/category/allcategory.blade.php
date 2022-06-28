@extends('backend.master')
@section('title','Add Category')
@section('content')
<div class="container-full">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Category Add Form</h4>
                    </div>
                    @if(Session::has('message'))
                    <p style="color:green;text-align:center">{{Session::get('message')}}</p>
                    @endif
                    <form class="form-horizontal form-element" action="{{route('store.category')}}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Category Type</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Category Name" name="name">
                                    @error('name')
                                    <span style="color:red;text-align:center">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">

                            <button type="submit" class="btn btn-rounded btn-info pull-right">
                                Add Category
                            </button>
                            <a href="{{route('view.category')}}" class="btn btn-rounded"> Category List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>>
</div>
@endsection