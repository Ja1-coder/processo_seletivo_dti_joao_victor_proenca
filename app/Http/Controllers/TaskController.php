<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks()->latest()->get();
        return view('task.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        auth()->user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 0
        ]);

        return redirect()->back()->with('success', 'Tarefa adicionada com sucesso!');
    }

    public function toggleStatus(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        $task->update([
            'status' => !$task->status
        ]);

        return redirect()->back()->with('success', 'Status da tarefa atualizado!');
    }

    public function destroy(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        $task->delete();

        return redirect()->back()->with('success', 'Tarefa removida!');
    }
}
