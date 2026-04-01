<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskValidateRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();

        return response()->json([
            "message" => "success",
            "data" => $tasks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskValidateRequest $request)
    {
        $task = $request->validated();
        $record = Task::create($task);

       if($record) {
           return response()->json([
               "message" => "success",
               "data" => $record
           ], 201);
       }

       return response()->json([
           "message" => "failed",
       ], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $projectId, string $taskId)
    {
        $task = Task::where('project_id', $projectId)->findOrFail($taskId);

        return response()->json([
            "message" => "success",
            "data" => $task
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskValidateRequest $request, string $projectId, string $taskId)
    {
        $newTask = $request->validated();

        $task = Task::where('project_id', $projectId)->findOrFail($taskId);

        $task->update($newTask);
        if($task) {
            return response()->json([
                "message" => "success",
                "data" => $task
            ], 201);
        }

        return response()->json([
            "message" => "failed",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $projectId, string $taskId)
    {
        $task =  Task::where('project_id', $projectId)->findOrFail($taskId);
        $task->delete();
        return response()->json([
            "message" => "success",
        ], 200);
    }



}
