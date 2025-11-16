@extends('layouts.app')

@section('content')


    <h2> Add New Task </h2>
        {{-- show all errors --}}
    @if ($errors->any())
    <div class="alert-alert-danger">
    <ul class="mb-0">
        @foreach ( $errors->all() as $error )
        <li> {{ $error }} </li>
        @endforeach
    </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label> Title </label>
        <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
        @error('title')
        <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    <div class="mb-3">
        <label> Description </label>
        <textarea name="description"  class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
        @error('description')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label> Image </label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" >
          @error('image')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-success"> Create </button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
    </form>

@endsection
