<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectValidateRequest;
use App\Http\Requests\TaskValidateRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectValidateRequest $request)
    {
        $validateProject = $request->validated();
        $record = Project::create($validateProject);

        if($record){
            return response()->json([
                "message" => "Project created",
                "data" => $record
            ], 201);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);
        if($project){
            return response()->json($project);
        }

        return response()->json([
            "message" => "Project not found"
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectValidateRequest $request, string $id)
    {
        $newData = $request->validated();
        $project = Project::findOrFail($id);
        $project->update($newData);

        return response()->json([
            "message" => "success",
            "data" => $project
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);

        $project->delete();
        return response()->json([
            "message" => "Project deleted successfully"
        ]);
    }
}
