@extends('backend.master')
@section('content')
<div class="col-12">
    <div class="box">
        <div class="box-body">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category List &emsp;&emsp;&emsp;
                        <a class="collapse-item" href="{{url('/admin/create-category')}}">Add Category</a></h6>
                </div>
                <div class="table-responsive">
                    <table id="example5" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>S.n</th>
                                <th>Namw</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getallcategory as $key=>$categories)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$categories->name}}</td>
                                <td>
                                    <input  class="categoryinput" type="checkbox"   data-id="{{$categories->id}}" {{ $categories->status ? 'checked' : '' }}>

                                </td>
                                <td>
                                    <a href="{{url('/admin/edit-category',$categories->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('delete.category',$categories->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('.categoryinput').change(function(e) {
                e.preventDefault();
                var status = $(this).prop('checked') == true ? 1 : 0;
                var categorystatus_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/admin/change-status',
                    data: {
                        'status': status,
                        'categorystatus_id': categorystatus_id
                    },
                    success: function(data) {
                        // console.log(data.success)
                        window.location.href="/admin/view-category"
                    }
                });
            })
        })
    </script>
    @endsection