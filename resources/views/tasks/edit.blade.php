@extends('layouts.app')

@section('content')

<h2> Edit Task </h2>

<form method="POST" action="/tasks/update" enctype="multipart/form-data">
    <div class="mb-3">
        <label> Title </label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label> Description </label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label> Image </label>
        <input type="file" name="image" class="form-control">
        <div>
            <img src="path/to/image.jpg" alt="" width="100">
        </div>
    </div>

    <button type="submit" class="btn btn-success"> Save </button>
    <a href="/tasks" class="btn btn-secondary">Back</a>
</form>


@endsection
