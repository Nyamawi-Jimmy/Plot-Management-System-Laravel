<?php

use App\Http\Controllers\BlocksController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('/admin', function () {
    return view('dashboard.admin');
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
    Route::get('tables', function () {return view('pages.tables');})->name('tables');
    Route::get('billing', function () {return view('pages.billing');})->name('billing');
    Route::get('notifications', function () {return view('pages.notifications');})->name('notifications');
    Route::get('static-sign-in', function () {return view('pages.static-sign-in');})->name('static-sign-in');
    Route::get('static-sign-up', function () {return view('pages.static-sign-up');})->name('static-sign-up');
    Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
    Route::get('verify', function () {return view('sessions.password.verify');})->middleware('guest')->name('verify');

Route::middleware(['auth:sanctum', 'role:Admin'])->group(function () {
    Route::get('user-management', [UsersController::class, 'createUsers'])->name('user-management');
    Route::get('getAllUsers', [UsersController::class, 'getAllUsers'])->name('allUsers');
    Route::post('/save-user', [UsersController::class, 'store'])->name('saveUser');
    Route::get('/user/{id}/find', [UsersController::class, 'findUser'])->name('user.find');
    Route::get('/user/{id}/view', [UsersController::class, 'view'])->name('user.view');
    Route::put('/user/{id}/update', [UsersController::class, 'update'])->name('user.update');
    Route::get('/user/{id}/delete', [UsersController::class, 'delete'])->name('user.delete');


    Route::get("property",[PropertiesController::class,"show"]);
    Route::get('getAllProperties', [PropertiesController::class, 'getAllProperties'])->name('allProperties');
    Route::post('/save-property', [PropertiesController::class, 'store'])->name('saveProperty');
    Route::get('/property/{id}/find', [PropertiesController::class, 'findProperty'])->name('property.find');
    Route::get('/property/{id}/view', [PropertiesController::class, 'view'])->name('property.view');
    Route::put('/property/{id}/update', [PropertiesController::class, 'update'])->name('property.update');
    Route::get('/property/{id}/delete', [PropertiesController::class, 'delete'])->name('property.delete');

    Route::get('blocks', [BlocksController::class, 'index'])->name('blocks');
    Route::get('getAllBlocks', [BlocksController::class, 'getAllBlocks'])->name('allBlocks');
    Route::post('/save-block', [BlocksController::class, 'store'])->name('saveBlock');
    Route::get('/block/{id}/find', [BlocksController::class, 'findBlock'])->name('block.find');
    Route::get('/block/{id}/view', [BlocksController::class, 'view'])->name('block.view');
    Route::put('/block/{id}/update', [BlocksController::class, 'update'])->name('block.update');
    Route::get('/block/{id}/delete', [BlocksController::class, 'delete'])->name('block.delete');

    Route::get('rooms', [RoomsController::class, 'create'])->name('rooms');
    Route::get('list', [RoomsController::class, 'list'])->name('list');
    Route::get('/room/{id}/find', [RoomsController::class, 'find'])->name('find');
    Route::put('/room/{id}/update',[RoomsController::class, 'update'])->name('update');
    Route::get('/room/{id}',[RoomsController::class, 'edit'])->name('edit');
    Route::get('/create',[RoomsController::class, 'create'])->name('create');
    Route::post('/create',[RoomsController::class, 'store'])->name('store');
    Route::get('/room/{id}/delete',[RoomsController::class, 'destroy'])->name('delete');

});
Route::middleware(['auth:sanctum', 'role:Moderator'])->group(function () {
        Route::get('blocks', [BlocksController::class, 'index'])->name('blocks');
        Route::get('getAllBlocks', [BlocksController::class, 'getAllBlocks'])->name('allBlocks');
        Route::post('/save-block', [BlocksController::class, 'store'])->name('saveBlock');
        Route::get('/block/{id}/find', [BlocksController::class, 'findBlock'])->name('block.find');
        Route::get('/block/{id}/view', [BlocksController::class, 'view'])->name('block.view');
        Route::put('/block/{id}/update', [BlocksController::class, 'update'])->name('block.update');
        Route::get('/block/{id}/delete', [BlocksController::class, 'delete'])->name('block.delete');

        Route::get('rooms', [RoomsController::class, 'create'])->name('rooms');
        Route::get('list', [RoomsController::class, 'list'])->name('list');
         Route::get('/room/{id}/find', [RoomsController::class, 'find'])->name('find');
         Route::put('/room/{id}/update',[RoomsController::class, 'update'])->name('update');
        Route::get('/room/{id}',[RoomsController::class, 'edit'])->name('edit');
        Route::get('/create',[RoomsController::class, 'create'])->name('create');
        Route::post('/create',[RoomsController::class, 'store'])->name('store');
        Route::get('/room/{id}/delete',[RoomsController::class, 'destroy'])->name('delete');
    });

