@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>To-Do List</h1>
        <a href="{{ route('todos.create') }}" class="btn btn-primary mb-3">Create New Todo</a>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Completed</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                    <tr>
                        <td>{{ $todo->id }}</td>
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->completed ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('todos.show', $todo->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
