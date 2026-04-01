<?php

use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TaskController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


#projects
Route::get("/projects", [ProjectsController::class, "index"]);
Route::post("/projects", [ProjectsController::class, "store"]);
Route::get("/projects/{id}", [ProjectsController::class, "show"]);
Route::put("/projects/{id}", [ProjectsController::class, "update"]);
Route::delete("/projects/{id}", [ProjectsController::class, "destroy"]);


#tasks
Route::get("/projects/{id}/tasks", [TaskController::class, "index"]);
Route::post("/projects/{id}/tasks", [TaskController::class, "store"]);
Route::get("/projects/{id}/tasks/{taskId}", [TaskController::class, "show"]);
Route::put("projects/{id}/tasks/{taskId}", [TaskController::class, "update"]);
Route::delete("/projects/{id}/tasks/{taskId}", [TaskController::class, "destroy"]);



#tags
Route::get("tags", [TagController::class, "index"]);
Route::post("tags", [TagController::class, "store"]);


#taskTag
Route::post("tasks/{taskId}/tags/{tagId}", [TagController::class, "attach"]);
Route::delete("tasks/{taskId}/tags/{tagId}", [TagController::class, "detach"]);



#profile
Route::get("users/{id}/profile", [UserController::class, "show"]);
Route::put("users/{id}/profile", [UserController::class, "update"]);
