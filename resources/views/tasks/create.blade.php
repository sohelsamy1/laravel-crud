@extends('layouts.app')

@section('content')

<h2> Add New Task </h2>

<form method="POST" action="/tasks/store" enctype="multipart/form-data">
    <div class="mb-3">
        <label> Title </label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="mb-3">
        <label> Description </label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label> Image </label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-success"> Create </button>
    <a href="/tasks" class="btn btn-secondary">Back</a>
</form>

@endsection
