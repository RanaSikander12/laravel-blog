@extends('admin.blocks.layout')

@section('title' , 'Dashboard | Blog Application')

@section('content')

<div class="container">
    
    @if(Session::has('success'))
    <div class="mt-3 mb-3 alert alert-success">{{Session::get('success')}}</div>
    @endif

    <a href="{{route('dashboard.post.add')}}" class="btn mt-5 mb-3 btn-success btn-sm float-end">Add New Post</a>
    <table class="table table-striped table-bordered mt-5 text-center align-items-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($posts)
            @php 
            $index = 1;
            @endphp

            @foreach($posts as $list)
            <tr>
                <td>{{ $index++ }}</td>
                <td>{{ $list->title }}</td>
                <td>{{ $list->content }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                           Action
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('dashboard.post.edit', $list->id)}}">Edit</a></li>
                            <li><a class="dropdown-item" href="{{route('dashboard.post.delete' , $list->id)}}">Delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>

</div>

@endSection