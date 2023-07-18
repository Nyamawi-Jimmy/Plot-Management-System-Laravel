<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlocksController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PropertiesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post("login",[AuthController::class,"login"]);
Route::post("register",[AuthController::class,"register"]);
Route::post("logout",[AuthController::class,"logout"])->middleware("auth:sanctum");


Route::middleware(['auth:sanctum', 'role:Admin'])->group(function () {
    Route::get("property",[PropertiesController::class,"show"]);
    Route::post("property",[PropertiesController::class,"store"]);
});

Route::middleware(['auth:sanctum', 'role:Moderator'])->group(function () {
    Route::get("property",[PropertiesController::class,"show"]);
    Route::post("categories",[CategoryController::class,"store"]);
    Route::post("blocks",[BlocksController::class,"store"]);
});

Route::middleware(['auth:sanctum', 'role:User'])->group(function () {
    Route::get("property",[PropertiesController::class,"show"]);
});


