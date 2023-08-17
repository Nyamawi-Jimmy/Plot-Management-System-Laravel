<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('screens.home');
});


    Route::get("home",[HomeController::class,"show"])->name('home');
    Route::get("about",[\App\Http\Controllers\AboutController::class,"show"])->name('about');
    Route::get("property-grid",[\App\Http\Controllers\PropertiesController::class,"show"])->name('property');
    Route::get("blog-grid",[\App\Http\Controllers\BlogController::class,"show"])->name('blog-grid');
    Route::get("blog-single",[\App\Http\Controllers\BlogSingleController::class,"show"])->name('blog-single');
    Route::get("property-single",[\App\Http\Controllers\PropertySingleController::class,"show"])->name('property-single');
    Route::get("agent-grid",[\App\Http\Controllers\AgentGridController::class,"show"])->name('agents-grid');
    Route::get("agent-single",[\App\Http\Controllers\AgentSingleController::class,"show"])->name('agent-single');
    Route::get("contact",[\App\Http\Controllers\ContactController::class,"show"])->name('contact');
    Route::post("message",[\App\Http\Controllers\MessageController::class,"post"])->name('message');
    Route::post("comment",[\App\Http\Controllers\CommentController::class,"post"])->name('comment');
    Route::get("reservation",[\App\Http\Controllers\ReservationController::class,"show"])->name('reservation');


