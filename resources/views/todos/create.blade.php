@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Todo</h1>
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Save</button>
        </form>
    </div>
@endsection
