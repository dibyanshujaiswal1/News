@extends('backend.master')
@section('content')
<div class="col-12" >
    <div class="box" >
        <div class="box-body" >
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Article List &emsp;&emsp;&emsp;<a class="collapse-item"
                    href="{{url('/admin/create-article')}}">Add Article</a></h6>
        </div>
            <div class="table-responsive">
                <table id="example5" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.n</th>
                            <th>Article Title</th>
                            <th>Article Image</th>
                            <th>Author Name</th>
                            <th>Article Description</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getallarticle as $key=>$articles)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$articles->title}}</td>
                            <td> 
                              <img src="{{asset('backend/img/article/'.$articles->image)}}" alt="" width="300" height="200">
                            </td>
                            <td>{{$articles->auther_name}}</td>
                              <td>{!!Str::limit($articles->description,20)!!}</td>
                              <td>
                                    <input  class="articleinput" type="checkbox"   data-id="{{$articles->id}}" {{ $articles->status ? 'checked' : '' }}>

                                </td>
                                <td>{{\Carbon\Carbon::parse($articles->date)->format('d-M-Y')}}</td>
                            <td>
                            <a href="{{url('/admin/edit-article',$articles->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('article.details',$articles->id)}}" class="btn btn-info">View</a>
                            <a href="{{route('delete.article',$articles->id)}}" class="btn btn-danger">Delete</a>
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
            $('.articleinput').change(function(e) {
                e.preventDefault();
                var status = $(this).prop('checked') == true ? 1 : 0;
                var articlestatus_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/admin/change-article-status',
                    data: {
                        'status': status,
                        'articlestatus_id': articlestatus_id
                    },
                    success: function(data) {
                        // console.log(data.success)
                        window.location.href="/admin/view-article"
                    }
                });
            })
        })
    </script>
@endsection