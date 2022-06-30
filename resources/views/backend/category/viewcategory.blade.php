@extends('backend.master')
@section('content')
<div class="col-12" >
    <div class="box" >
        <div class="box-body" >
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Category List &emsp;&emsp;&emsp;<a class="collapse-item"
                    href="{{url('create-category')}}">Add Category</a></h6>
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
                                <input data-id="{{$categories->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive"  {{ $categories->status == 1 ? 'checked' : '' }} >
                            </td>
                            <td>
                                <a href="{{url('edit-category',$categories->id)}}" class="btn btn-info">Edit</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
$(document).ready(function(){
    $('.toggle-class').click(function(){
        var status = $(this).children().prop('checked') == true ? 1 : 0;
     var category_id = $(this).children().data('id');
        console.log(category_id)
            $.ajax({
                type: "GET",
                dataType : "json",
                url: 'change-status',
                data : {'status': status, 'category_id': category_id},
                headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
                success: function(data){
                    console.log('Success')
                }
            });

    });
    });
</script>

@endsection