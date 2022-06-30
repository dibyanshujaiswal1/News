@extends('backend.master')
@section('content')
<div class="col-12" >
    <div class="box" >
        <div class="box-body" >
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">SubCategory List &emsp;&emsp;&emsp;<a class="collapse-item"
                    href="{{url('add-subcategory')}}">Add SubCategory</a></h6>
        </div>
            <div class="table-responsive">
                <table id="example5" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.n</th>
                            <th>Category Type</th>
                            <th>Sub Category Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getallsubcategory as $key=>$subcategories)
                        <tr>
                            <td>{{$key+1}}</td>
                          
                            <td>{{$subcategories->category->name}}</td>
                            <td>{{$subcategories->name}}</td>
                            <td>
                                <input data-id="{{$subcategories->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive"  {{ $subcategories->status == 1 ? 'checked' : ''}} >
                            </td>
                            <td>
                                <a href="{{url('edit-subcategory',$subcategories->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('delete.subcategory',$subcategories->id)}}" class="btn btn-danger">Delete</a>
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