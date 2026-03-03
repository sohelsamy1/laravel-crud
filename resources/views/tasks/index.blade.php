@extends('layouts.app')

@section('content')

<h2> Task List</h2>
<a href="#" class="btn btn-primary mb-3"> +Add Task</a>

<div class="alert alert-success">Task created successfully</div>

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
       <tr>
        <td>1</td>
        <td>Sample Task</td>
        <td>This is a sample task description</td>
        <td><img src="path/to/image.jpg" width="100"></td>
        <td>
            <a href="#" class="btn btn-warning btn-sm">Edit</a>
            <form action="#" method="POST" style="display: inline-block">
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
       </tr>
       <tr>
        <td>2</td>
        <td>Another Task</td>
        <td>Another description</td>
        <td>N/A</td>
        <td>
            <a href="#" class="btn btn-warning btn-sm">Edit</a>
            <form action="#" method="POST" style="display: inline-block">
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
       </tr>
  </tbody>
</table>

@endsection
