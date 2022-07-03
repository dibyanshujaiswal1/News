@extends('backend.master')
@section('content')
<div class="col-12" >
    <div class="box" >
        <div class="box-body" >
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Video List &emsp;&emsp;&emsp;<a class="collapse-item"
                    href="{{url('/admin/create-video')}}">Add Video</a></h6>
        </div>
            <div class="table-responsive">
                <table id="example5" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.n</th>
                            <th>Video Title</th>
                            <th>Thumbnails Image</th>
                            <th>Video URL</th>
                            <th>Video Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getallvideo as $key=>$videoes)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$videoes->title}}</td>
                            <td> 
                              <img src="{{asset('backend/img/video/'.$videoes->thumbnails_image)}}" alt="" width="300" height="200">
                            </td>
                            <td>{{$videoes->video_url}}</td>
                              <td>{!!Str::limit($videoes->description,20)!!}</td>
                              <td>
                                    <input  class="videoinput" type="checkbox"   data-id="{{$videoes->id}}" {{ $videoes->status ? 'checked' : '' }}>

                                </td>
                            <td>
                            <a href="{{url('/admin/edit-video',$videoes->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{route('delete.video',$videoes->id)}}" class="btn btn-danger">Delete</a>
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
            $('.videoinput').change(function(e) {
                e.preventDefault();
                var status = $(this).prop('checked') == true ? 1 : 0;
                var videoestatus_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/admin/change-video-status',
                    data: {
                        'status': status,
                        'videoestatus_id': videoestatus_id
                    },
                    success: function(data) {
                        // console.log(data.success)
                        window.location.href="/admin/view-video"
                    }
                });
            })
        })
    </script>
@endsection