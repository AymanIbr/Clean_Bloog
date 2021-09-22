

@extends('admin.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Update Category</h2>
@include('admin.layouts.error')
    <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <input type="text"  name="title" value="{{$post->title}}"class="form-control" placeholder="Title">
        </div>
        <div class="mb-3">
            <input type="text"name="subtitle" value="{{$post->subtitle}}" class= "form-control" placeholder="Sub_Title">
        </div>
        <div class="mb-3">
            <textarea name="content" class="form-control" placeholder="Content"  rows="6">{{$post->content}}</textarea>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file"name="image" class="form-control">
            <img width="70" src="{{asset('uplods/'.$post->image)}}" alt="">
        </div>
        <select name="category_id" class="form-control mb-4" >
            <option value=""selected disabled>Select Category</option>
                @foreach ( $categories as $category )

                    <option {{$category->id == $post->category_id ? 'selected' : '' }} value="{{$category->id}}">{{$category ->name}}</option>
                @endforeach
        </select>
<button class="btn btn-primary px-5">Update</button>
    </form>
</div>
</div>
</div>

@stop
