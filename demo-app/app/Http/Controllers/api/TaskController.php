<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    protected $taskService;
    public function __construct(TaskService $taskService)
    {


        $this->middleware('auth:api');
        $this->taskService = $taskService;

    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = $this->taskService->create($validated);
        
        return messageHelper("Task Created Successfully", $task);
    }

    public function edit(Request $request, Task $task)
    {

        $validate = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = $this->taskService->editTask($task, $validate, $request->user()->id);


        return messageHelper("Task Updated Successfully", $task);
    }




    public function assign(Request $request, $taskId)
    {
        $validated = $request->validate([
            'assigned_to' => 'required|string|max:255',
        ]);

        $task = $this->taskService->assignTask($taskId, $validated);

        return messageHelper("Task Assigned Successfully. Updated Task are ", $task);
    }




    public function delete($taskId)
    {
        $deletedTask = $this->taskService->deleteTask($taskId);

        return messageHelper("Task Deleted Successfully", $deletedTask);
    }
}
