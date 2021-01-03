<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\Admin\PostsController;
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
Route::redirect('/', '/admin/homepage');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/homepage', [HomepageController::class, 'dashboard'])->name('dashboard');
    Route::post('/homepage', [HomepageController::class, 'update']);
    Route::get('/posts-list', [PostsController::class, 'getAllPosts'])->name('post_list');
    Route::get('/post-create', [PostsController::class, 'create'])->name('create');
    Route::post('/post-create', [PostsController::class, 'store'])->name('store');
    Route::get('/post-edit/{post}', [PostsController::class, 'getSinglePost'])->name('edit');
    Route::put('/post-edit/{post}', [PostsController::class, 'update'])->name('update');
    Route::delete('/delete/{post}', [PostsController::class, 'destroy'])->name('delete');
    Route::resource('courses', CourseController::class);

    Route::get('test', function () {})->name('test');
});
