@extends('frontend.blocks.layouts')

@section('title' , 'Home | Blog Application')


@section('content')
<div class="text-center w-100">
    <h3 class="rounded-pill text-white bg-success mt-5 mx-auto pt-2 pb-2" style="width : 30%">Latest Posts</h3>
</div>

<div class="container">
    <div class="row mt-5">

        @foreach($posts as $list)
        <div class="col-3">
            <div class="card bg-white shadow-sm border-0 mb-5">
                <div class="card-header bg-success text-white border-0 pt-2 pb-2">
                    <h4 class="fw-bold text-center">{{$list->title}}</h4>
                </div>
                <div class="card-body">
                    <a href="{{route('read-blog' , $list->id)}}" class="btn btn-info btn-sm mt-2 form-control text-white">Read Now</a>
                </div>
                <div class="card-footer bg-white border-0">
                   Time : {{$list->created_at->format('H:i:s')}}
                    <br>
                    Date : {{$list->created_at->format('d-m-y')}}
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endSection