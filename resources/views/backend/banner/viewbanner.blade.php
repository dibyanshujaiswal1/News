@extends('backend.master')
@section('content')
<div class="col-12" >
    <div class="box" >
        <div class="box-body" >
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Banner List &emsp;&emsp;&emsp;<a class="collapse-item"
                    href="{{url('/admin/add-banner')}}">Add Banner</a></h6>
        </div>
            <div class="table-responsive">
                <table id="example5" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.n</th>
                            <th>Banner Heading</th>
                            <th>Banner Image</th>
                            <th>Banner Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getallbanner as $key=>$banners)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$banners->banner_heading}}</td>
                            <td> 
                              <img src="{{asset('backend/img/banner/'.$banners->banner_image)}}" alt="" width="300" height="300">
                            </td>
                              <td>{!!Str::limit($banners->banner_description,20)!!}</td>
                            <td>
                            <a href="{{url('/admin/edit-banner',$banners->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('delete.banner',$banners->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection