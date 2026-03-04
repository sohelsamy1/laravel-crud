@extends('layouts.app')

@section('content')

<h2> Task List</h2>
<a href="{{ route('tasks.create')}}" class="btn btn-primary mb-3"> +Add Task</a>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-bordered">
  <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
  </thead>

  <tbody>
      @foreach ($tasks as $task)
       <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $task->title }}</td>
        <td>{{ $task->description }}</td>
        <td>
            @if($task->image)
                <img src="{{ asset('storage/'.$task->image) }}" width="100">
            @else
                N/A
            @endif
        </td>
        <td>
            <button class="btn btn-warning btn-sm">Edit</button>
            <button class="btn btn-danger btn-sm">Delete</button>
        </td>
       </tr>
      @endforeach
   </tbody>
</table>

@endsection
