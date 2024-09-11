<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Todo::create($request->all());

        return redirect()->route('todos.index')
                         ->with('success', 'Todo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $todo = Todo::findOrFail($id);
        $todo->update([
            'title' => $request->input('title'),
            'completed' => $request->has('completed') ? 1 : 0,
        ]);
        return redirect()->route('todos.index')
                         ->with('success', 'Todo updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return redirect()->route('todos.index')
                         ->with('success', 'Todo deleted successfully.');
    }
}
