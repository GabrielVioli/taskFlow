<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagValidateRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();

        return response()->json([
            "message" => "success",
            "data" => $tags
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(TagValidateRequest $request)
    {
        $tag = $request->validated();
        $record = Tag::create($tag);
        return response()->json([
            "message" => "Tag created",
            "record" => $record
        ]);
    }

    public function attach(string $taskId, string $tagId)
    {
        $task = Task::findOrFail($taskId);

        // Vincula a tag à task sem duplicar
        $task->tags()->syncWithoutDetaching([$tagId]);

        return response()->json([
            "message" => "Tag vinculada com sucesso"
        ], 200);
    }

    public function detach(string $taskId, string $tagId)
    {
        $task = Task::findOrFail($taskId);

        $task->tags()->detach($tagId);

        return response()->json([
            "message" => "Tag desvinculada com sucesso"
        ], 200);
    }
}
