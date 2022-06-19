<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

Auth::routes();

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [PostController::class, 'get_all_posts'])->name('home');
Route::get('/post/{post:slug}', [PostController::class, 'view'])->name('post.view');

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [UserController::class, 'get_published_posts'])->name('dashboard');
    Route::get('/dashboard/post/new', [PostController::class, 'new'])->name('post.new');
    Route::post('/dashboard/post/store', [PostController::class, 'store'])->name('post.create');
});
