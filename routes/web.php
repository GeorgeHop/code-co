<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::get('/', function () {return view('welcome');});
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/registration', [AuthController::class, 'showRegistration']);
Route::post('/registration', [AuthController::class, 'signup'])->name('registration');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/confirm', function () {return view('user.pages.Login&Registration.confirm');});

Route::get('/blog-list', [BlogController::class, 'getAllPosts']);
Route::get('/blog-single/{post}', [BlogController::class, 'getSinglePost'])->name('single');
Route::get('/about', function () {return view('user.pages.About.about');});
Route::get('/courses', function () {return view('user.pages.Courses.courses');});
Route::view('/course', 'user.pages.Courses.courses_single');
Route::get('/contacts', function () {return view('user.pages.Contacts.contacts');});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/user-panel');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user-panel', function () {return view('user.pages.UserPanel.user_main');})->name('user.panel');
    Route::get('/user-course-list', function () {return view('user.pages.UserPanel.user_course_list');});
});

Route::get('/test', function () {
    $user = \App\Models\User::first();
    $course = $user->courses->first();

    $materials = $course->materials;

    dd($materials);
});
