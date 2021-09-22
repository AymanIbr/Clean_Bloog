

@extends('admin.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">All Category</h2>
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
        <th>Name</th>
        <th>Created_At</th>
        <th>Action</th>
    </tr>
        @foreach ($categories as $category )
        <tr>
            <td>{{$category->id }}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->created_at->format('d-m-Y')}}</td>
            <td>
                <a href="{{route('categories.edit',$category->id)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                <form class="d-inline" action="{{route('categories.destroy',$category->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm ('are you sure ?') " class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
</table>
{{$categories->links() }}
</div>
</div>
</div>

@stop
