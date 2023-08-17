<?php

use App\Http\Controllers\BlocksController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;


Route::get('/admin', function () {
    return view('dashboard.index');
})->name('admin');

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
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
    Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
    Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
    Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
    Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
    Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
    Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
    Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
    Route::get('user-profile', [ProfileController::class, 'view'])->name('user-profile');
    Route::get('user-management', function () {return view('pages.laravel-examples.user-management');})->name('user-management');
    Route::get('tables', function () {return view('pages.tables');})->name('tables');
    Route::get('billing', function () {return view('pages.billing');})->name('billing');
    Route::get('notifications', function () {return view('pages.notifications');})->name('notifications');
    Route::get('static-sign-in', function () {return view('pages.static-sign-in');})->name('static-sign-in');
    Route::get('static-sign-up', function () {return view('pages.static-sign-up');})->name('static-sign-up');
    Route::get('user-management', function () {return view('pages.laravel-examples.user-management');})->name('user-management');
    Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
    Route::get('verify', function () {return view('sessions.password.verify');})->middleware('guest')->name('verify');

    Route::get('blocks', [BlocksController::class, 'index'])->name('blocks');
    Route::get('getAllBlocks', [BlocksController::class, 'getAllBlocks'])->name('allBlocks');
    Route::post('/save-block', [BlocksController::class, 'store'])->name('saveBlock');
    Route::get('/block/{id}/find', [BlocksController::class, 'findBlock'])->name('block.find');
    Route::get('/block/{id}/view', [BlocksController::class, 'view'])->name('block.view');
    Route::put('/block/{id}/update', [BlocksController::class, 'update'])->name('block.update');
    Route::get('/block/{id}/delete', [BlocksController::class, 'delete'])->name('block.delete');





