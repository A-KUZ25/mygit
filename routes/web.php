<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
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

Route::get('/', [PostController::class, 'index'])->name('post.index');

//Роуты модели POST
Route::resource('post', PostController::class);

Route::get('/test', [TestController::class, 'index'])->name('Test.index');
//Route::get('/post', [PostController::class, 'index'])->name('post.index');
//Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
//Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');


//Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
//Route::patch('/post/{post}', [PostController::class, 'update'])->name('post.update');
//Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.delete');
//Route::post('/post', [PostController::class, 'store'])->name('post.store');

