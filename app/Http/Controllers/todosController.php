<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class todosController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function show(Todo $todo){
        return view('todos.show')->with('todo', $todo);
    }

    public function create(){
        return view('todos.create');
    }

    public function store(Request $request){
        $request->validate([
            'todoTitle' => 'required|min:6',
            'todoDescription' => 'required'
        ]);
        $todo = new Todo;
        $todo->title = $request->todoTitle;
        $todo->description = $request->todoDescription;
        $todo->save();
        $request->session()->flash('success','The Task Created Successfuly');
        return redirect('/todos');
    }

    public function edit(Todo $todo){
        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Request $request , Todo $todo){
        $request->validate([
            'todoTitle' => 'required|min:6',
            'todoDescription' => 'required'
        ]);
        $todo->title = $request->todoTitle;
        $todo->description = $request->todoDescription;
        $todo->save();
        $request->session()->flash('success','The Task Edited Successfuly');
        return redirect('/todos');
    }

    public function destroy(Todo $todo){
        $todo->delete();
        session()->flash('success','The Task Deleted Successfuly');
        return redirect('/todos');
    }

    public function complete(Todo $todo){
        $todo->completed = true;
        $todo->save();
        session()->flash('success','The Task Completed Successfuly');
        return redirect('/todos');
    }
}
