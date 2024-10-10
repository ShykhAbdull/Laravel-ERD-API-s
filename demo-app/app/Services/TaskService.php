<?php

namespace App\Services;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskService{


    public function create(array $data)
    {

        return  Task::create([

            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'created_by' => Auth::id(),

        ]);

    }


    public function editTask(Task $task, array $data, $userId)
    {
        if ($task->created_by !== $userId) {
            return ['error' => 'Unauthorized', 'status' => 403];
        }

        $task->update([
            'title' => $data['title'] ?? $task->title, 
            'description' => $data['description'] ?? $task->description, 
        ]);

        return ['task' => $task, 'status' => 200];
    }

    public function assignTask($taskId, array $data)
    {
        $task = Task::find($taskId);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->assigned_to = $data['assigned_to'];
        $task->save();

        return $task;
    }


    public function deleteTask($taskId)
    {
        $task = Task::find($taskId);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return $task;
    }
    

}
