<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        Task::create($validatedData);
        // return redirect('/tasks/create')->with('success', 'Task created successfully');
        return redirect('/tasks')->with('success', 'Task created successfully');
    }

    public function index() {
        // $tasks = Task::paginate(6);
        $tasks = Task::all();
        return view('index', ['tasks' => $tasks]);
    }

    public function edit($id) {
        $task = Task::find($id);
        return view('edit', ['task' => $task]);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validated([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $task = Task::find($id);
        $task->update($validatedData);

        return redirect('/tasks')->with('success', 'Task updated successfully');
    }

    public function destroy($id){
        $task = Task::find($id);
        $task->delete();

        return redirect('/tasks')->with('success','Task deleted Successfully');
    }

    public function search(Request $request){
        $query = $request->input('query');
        $tasks = Task::where('title','like','%'.$query.'%')->orwhere('description','like','%'.$query.'%')->get();
        return view('index',['tasks'=>$tasks]);
    }
}

