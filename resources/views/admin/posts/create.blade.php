

@extends('admin.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Add New Post</h2>
@include('admin.layouts.error')
    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
        <input type="text"name= "title" class="form-control" placeholder="Title">
    </div>
    <div class="mb-3">
        <input type="text"name= "subtitle" class="form-control" placeholder="Sub_Title">
    </div>
    <div class="mb-3">
        <textarea name="content" class="form-control" placeholder="Content"  rows="6"></textarea>
    </div>
    <div class="mb-3">
        <input type="file"name= "image" class="form-control">
    </div>
    <select name="category_id" class="form-control mb-4" >
        <option value=""selected disabled>Select Category</option>
            @foreach ( $categories as $category )
                <option value="{{$category->id}}">{{$category->name}}}</option>
            @endforeach
    </select>
<button class="btn btn-info px-5">Add</button>
    </form>
</div>
</div>
</div>

@stop
