<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        // dd('asdf');
        $request->validate([
            'task' => 'required|string|max:255',
        ]);


        Todo::create(['task' => $request->task]);

        return redirect()->route('todos.index');
    }


    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        $todos = Todo::all();
        return view('todos.index', compact('todo', 'todos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'task' => 'required|string|max:255',
        ]);

        $todo = Todo::findOrFail($id); // Will throw 404 if not found

        $todo->update(['task' => $request->task]);

        return redirect()->route('todos.index');
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id); // Will throw 404 if not found

        $todo->delete();

        return redirect()->route('todos.index');
    }
}
