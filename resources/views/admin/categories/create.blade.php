

@extends('admin.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Add New Category</h2>
@include('admin.layouts.error')
    <form action="{{route('categories.store')}}" method="post">
        @csrf
<div class="mb-3">
    <input type="text"name= "name" class="form-control" placeholder="Name">
</div>
<button class="btn btn-info px-5">Add</button>
    </form>
</div>
</div>
</div>

@stop
