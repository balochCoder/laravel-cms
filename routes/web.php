<?php

use App\Http\Controllers\Blog\PostController as BlogPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[WelcomeController::class,'index'])->name('welcome');

Route::get('/blog/post/{post}',[BlogPostController::class,'show'])->name('blog.post');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('post', PostController::class);

    Route::get('trash', [PostController::class, 'trashed'])->name('trashed');
    Route::put('restore/{post}', [PostController::class, 'restore'])->name('restore');
    Route::get('user/profile',[UserController::class,'profile'])->name('users.profile');
    Route::put('user/profile',[UserController::class,'update'])->name('users.update');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('user', [UserController::class, 'index'])->name('users');
    Route::put('user/{user}/admin',[UserController::class,'makeAdmin'])->name('users.admin');
    Route::put('user/{user}/writer',[UserController::class,'makeWriter'])->name('users.writer');
});
