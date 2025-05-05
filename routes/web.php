<?php

use App\Http\Controllers\PostsController;
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

Route::get('/', [PostsController::class, 'index'])->name('post.index');

//Роуты модели POST
Route::get('/post', [PostsController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostsController::class, 'create'])->name('post.create');
Route::get('/post/{post}', [PostsController::class, 'show'])->name('post.show');
Route::get('/post/{post}/edit', [PostsController::class, 'edit'])->name('post.edit');
Route::patch('/post/{post}', [PostsController::class, 'update'])->name('post.update');
Route::delete('/post/{post}', [PostsController::class, 'destroy'])->name('post.delete');
Route::post('/post', [PostsController::class, 'store'])->name('post.store');

//Роуты модели ABOUT
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');

//Роуты модели MAIN
Route::get('/main', [\App\Http\Controllers\MainController::class, 'index'])->name('main.index');

//Роуты модели CONTACT
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');

