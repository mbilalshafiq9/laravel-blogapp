<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CommentsController;

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('blogs', BlogsController::class);
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'show']);
Route::get('/my-blogs', [App\Http\Controllers\BlogsController::class, 'myblogs']);
Route::get('/edit_blog/{id}', [App\Http\Controllers\BlogsController::class, 'edit']);
Route::get('/write-blog', [App\Http\Controllers\BlogsController::class, 'writeblog']);
Route::get('/search', [App\Http\Controllers\BlogsController::class, 'search']);
Route::resource('comments', CommentsController::class);
// Route::get('/home', function () {
//     return view('home');
// });