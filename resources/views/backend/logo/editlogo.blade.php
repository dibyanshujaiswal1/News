@extends('backend.master')
@section('content')
<div class="container-full">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Update Logo</h4>
                    </div>
                    <form class="form-horizontal form-element" action="{{route('update.logo',$data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">Add Logo</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" placeholder="Enter Logo Image" name="logo">
                                    <img src="{{asset('backend/img/logo/'.$data->logo)}}" alt="" width="100" height="100" value="{{$data->logo}}">

                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-rounded btn-info pull-right">
                                Update Logo
                            </button>
                            <a href="{{route('view.logo')}}" class="btn btn-rounded"> Logo List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>>
</div>
@endsection