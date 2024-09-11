@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Todo</h1>
        <form action="{{ route('todos.update', $todo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $todo->title }}" required>
            </div>
            <div class="form-group">
                <label for="completed">Completed:</label>
                <input type="checkbox" id="completed" name="completed" {{ $todo->completed ? 'checked' : '' }}>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update</button>
        </form>
    </div>
@endsection
