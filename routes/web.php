<?php

use App\Http\Controllers\AuthController;
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
Route::get('/login', [AuthController::class, 'login']);
Route::get('/registration', [AuthController::class, 'registration']);
Route::get('/blog-list', function () {return view('Blog.blog_list');});
Route::get('/about', function () {return view('About.about');});
Route::get('/courses', function () {return view('Courses.courses');});
Route::get('/user-panel', function () {return view('UserPanel.user_main');});
Route::get('/user-course-list', function () {return view('UserPanel.user_course_list');});
