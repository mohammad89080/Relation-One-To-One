<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile',[ProfileController::class,'index'])->name('profile');
Route::put('/profile/update',[ProfileController::class,'update'])->name('profile.update');

Route::get('/posts', [PostController::class,'index'] )->name('posts');
Route::get('/posts/trashed', [PostController::class,'postsTrashed'] )->name('posts.trashed');
Route::get('/post/create', [PostController::class,'create'] )->name('post.create');
Route::post('/post/store', [PostController::class,'store'] )->name('post.store');
Route::get('/post/show/{slug}', [PostController::class,'show'] )->name('post.show');
Route::get('/post/edit/{id}', [PostController::class ,'edit'] )->name('post.edit');
Route::post('/post/update/{id}', [PostController::class ,'update'] )->name('post.update');
Route::get('/post/destroy/{id}', [PostController::class ,'destroy'] )->name('post.destroy');
Route::get('/post/hdelete/{id}', [PostController::class,'hdelete'] )->name('post.hdelete');
Route::get('/post/restore/{id}', [PostController::class ,'restore'] )->name('post.restore');
