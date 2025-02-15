<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\OffersController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

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

    Route::resource('posts', PostsController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('users', UserController::class);
    Route::post('users/{user}/subscribe', [UserController::class, 'subscribeCourse'])->name('users.subscribe');
    Route::delete('users/{user}/unsubscribe/{course}', [UserController::class, 'unsubscribeCourse'])->name('users.unsubscribe');
    Route::resource('courses/{course}/videos', VideoController::class);
    Route::resource('courses/{course}/videos/{video}/material', MaterialController::class);
    Route::view('/live-chat', 'admin.pages.liveChat.live_chat')->name('live-chat');
    Route::view('/live-chat/single', 'admin.pages.liveChat.single')->name('live-chat-single');
    Route::resource('courses/{course}/offers', OffersController::class);
    Route::resource('site', SiteController::class);

    Route::prefix('lfm')->group(function () {
        Lfm::routes();
    });

    Route::get('test', function () {})->name('test');
});
