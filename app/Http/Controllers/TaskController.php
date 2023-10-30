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
        return redirect('/tasks/create')->with('success', 'Task created successfully');
    }
}


