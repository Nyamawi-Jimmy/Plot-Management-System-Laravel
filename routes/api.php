<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlocksController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\RoomHistoryController;
use App\Http\Controllers\RoomsController;
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
    Route::get("dashboard",[DashBoardController::class,"show"]);
    Route::get("room_history",[RoomHistoryController::class,"show"]);
    Route::post("property",[PropertiesController::class,"store"]);
    Route::get("rooms",[RoomsController::class,"show"]);

});

Route::middleware(['auth:sanctum', 'role:Moderator'])->group(function () {
    Route::get("property",[PropertiesController::class,"show"]);
    Route::post("categories",[CategoryController::class,"store"]);
    Route::get("dashboard",[PropertiesController::class,"show"]);
    Route::post("blocks",[BlocksController::class,"store"]);
    Route::get("room_history",[RoomHistoryController::class,"show"]);
    Route::get("rooms",[RoomsController::class,"show"]);


});

Route::middleware(['auth:sanctum', 'role:User'])->group(function () {
    Route::get("property",[PropertiesController::class,"show"]);
    Route::get("room_history",[RoomHistoryController::class,"show"]);
    Route::get("rooms",[RoomsController::class,"show"]);




});


