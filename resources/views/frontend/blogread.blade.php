@extends('frontend.blocks.layouts')

@section('title' , $post->title.' '.'| Blog')


@section('content')
<div class="container read mt-4">
    <h4 class="text-center">{{$post->title}}</h4>
    <p class="mt-5 mb-5 text-center">
        {{$post->content}}
    </p>



    Date : {{$post->created_at->format('d-m-y')}}
</div>
@endSection



<style>
.read {
    background-color: whitesmoke;
    padding: 30px;
}
</style>