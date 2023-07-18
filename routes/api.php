<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post("property",[\App\Http\Controllers\PropertiesController::class,"store"]);
Route::post("categories",[\App\Http\Controllers\CategoryController::class,"store"]);
Route::post("blocks",[\App\Http\Controllers\BlocksController::class,"store"]);


