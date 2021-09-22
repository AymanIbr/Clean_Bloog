

@extends('admin.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">All Posts</h2>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
            @endif
@include('admin.layouts.error')
<table class="table">
    <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Title</th>
        <th>Subtitle</th>
        <th>User</th>
        <th>Category</th>
        <th>Created_At</th>
        <th>Action</th>
    </tr>
        @foreach ($posts as $post )
        <tr>
            <td>{{$post->id}}</td>
            <td>
            <img width="70" src="{{asset('uplods/'.$post->image)}}" alt="">
            </td>
            <td>{{$post->title}}</td>
            <td>{{$post->subtitle}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category->name}}</td>
            <td>{{$post->created_at->format('d-m-Y')}}</td>
            <td>
                <a href="{{route('posts.edit',$post->id)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                <form class="d-inline" action="{{route('posts.destroy',$post->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm ('are you sure ?') " class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
</table>
{{$posts->links() }}
</div>
</div>
</div>

@stop
