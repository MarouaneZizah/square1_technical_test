<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', [PostController::class, 'get_all_posts'])->name('home');
Route::get('/post/{post:slug}', [PostController::class, 'view'])->name('post.view');
Route::get('/user/{user}/posts', [PostController::class, 'get_post_view'])->name('user.posts');

Route::get('/dashboard', [PostController::class, 'get_all_posts'])->name('dashboard');
