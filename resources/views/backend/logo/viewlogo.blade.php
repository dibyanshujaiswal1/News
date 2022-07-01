@extends('backend.master')
@section('content')
<div class="col-12" >
    <div class="box" >
        <div class="box-body" >
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Logo List &emsp;&emsp;&emsp;<a class="collapse-item"
                    href="{{url('/admin/add-logo')}}">Add Logo</a></h6>
        </div>
            <div class="table-responsive">
                <table id="example5" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.n</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getalllogo as $key=>$logos)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td> 
                              <img src="{{asset('backend/img/logo/'.$logos->logo)}}" alt="" width="300" height="300">
                            <td>
                            <a href="{{url('/admin/edit-logo',$logos->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('delete.logo',$logos->id)}}" class="btn btn-danger">Delete</a>
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