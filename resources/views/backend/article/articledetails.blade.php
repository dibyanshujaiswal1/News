@extends('backend.master')
@section('title','Article Details')
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary"><a class="collapse-item"
                    href="{{url('/admin/create-article')}}">Add Article</a>&emsp;&emsp;&emsp;<a href="{{route('view.article')}}" class="collapse-item"> Article List</a><br><br>{{$articlesdetails->title}}
                    <br><br> {{$articlesdetails->date}}</h4>
                </div>
                <div class="col-xl-12 col-lg-9">
                <h4 class=""><h6 class="m-0 font-weight-bold text-primary">{{$articlesdetails->auther_name}}</h6></h4>
                </div>
                <h6 class="m-0 font-weight-bold text-primary"><img src="{{asset('backend/img/article/'.$articlesdetails->image)}}" alt="" width="300" height="300"></h6>
                <h6 class="m-0 font-weight-bold text-primary">{!!$articlesdetails->description!!}</h6>
                </div>
        </div>
    </div>
</div>
</div>
@endsection