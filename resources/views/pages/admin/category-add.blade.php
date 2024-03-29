@extends('layouts.mainlayout')

@section('title','Add Category')

@section('content')
    <h1>Add New Category</h1>

    <div class="mt-5 w-25">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.category.store') }}" method ="post">
        @csrf
        <div>
            <label for="name" class="form-label">Name<strong class="text-danger">*</strong></label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Category Name">
        </div>
        <div class="mt-3">
            <a href="{{ route('admin.category') }}" class="btn btn-secondary me-3">Back</a>
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </div>
@endsection
