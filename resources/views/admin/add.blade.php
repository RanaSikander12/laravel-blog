@extends('admin.blocks.layout')
@section('title' , 'Add New Post')
@section('content')
<div class="container">
    <form action="{{route('dashboard.post.save')}}" method="post">
        @csrf
        <div class="card mx-auto mt-3 shadow-sm border-0" style="width : 50%">
            <div class="card-header">
                <h4 class="text-center">Add New Post</h4>
            </div>
        <div class="card-body">
            <label for="" class="mt-1 mb-1">Title</label>
            <input type="text" class="form-control" name="title" value="{{old('title')}}">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <label for="" class="mt-2 mb-1">Content</label>
            <textarea name="content" class="form-control" id="" cols="20" rows="5">
                {{old('content')}}
            </textarea>
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="card-footer">
            <button class="btn btn-success form-control">Add</button>
        </div>

    </form>


</div>
@endSection