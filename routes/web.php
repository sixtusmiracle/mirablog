<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\PagesController::class, 'index']);
Route::get('/about', [App\Http\Controllers\PagesController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\PagesController::class, 'contact'])->name('contact');

Route::resource('posts', App\Http\Controllers\PostsController::class)->except(['index']);
Route::resource('comments', App\Http\Controllers\CommentsController::class)->only(['store', 'destroy']);
Route::resource('replies', App\Http\Controllers\RepliesController::class)->only(['store', 'destroy']);

Route::get('/categories/{id}', [App\Http\Controllers\PostsController::class, 'category']);
Route::get('/posts/find/{term}', [App\Http\Controllers\PostsController::class, 'search']);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/profile', [App\Http\Controllers\DashboardController::class, 'profile'])->name('profile');
Route::post('/dashboard/profile', [App\Http\Controllers\DashboardController::class, 'uploadProfileImage'])->name('updateProfileImage');

Route::get('/linkstorage', function () {
  Artisan::call('storage:link');
});
