<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LiveChatController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPanelController;
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

Route::get('/', [CourseController::class, 'main'])->name('main');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/registration', [AuthController::class, 'showRegistration']);
Route::post('/registration', [AuthController::class, 'signup'])->name('registration');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/confirm', function () {return view('user.pages.Login&Registration.confirm');});

Route::get('/blog-list', [BlogController::class, 'getAllPosts']);
Route::get('/blog-single/{post}', [BlogController::class, 'getSinglePost'])->name('single');
Route::get('/about', function () {return view('user.pages.About.about');});
Route::get('/courses', [CourseController::class, 'index'])->name('courses.list');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/contacts', function () {return view('user.pages.Contacts.contacts');});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect(route('user.panel'));
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::view('/email-not-verified', 'user.pages.Login&Registration.confirm')->middleware('auth')->name('verification.notice');

Route::view('live-chat', 'testchat');
Route::post('live-chat/send', [LiveChatController::class, 'send'])->name('live-chat.send');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/generate-payment', [PaymentsController::class, 'generate'])->name('payments.generate');
    Route::post('/approve-payment', [PaymentsController::class, 'approve']);
    Route::get('/user-panel/courses', [UserPanelController::class, 'index'])->name('user.panel');
    Route::get('/user-panel/player/{video}', [UserPanelController::class, 'show'])->name('user.player');
    Route::get('/user-panel/profile', [UserController::class, 'edit'])->name('user.profile');
});

Route::get('/test', function () {
    $user = \App\Models\User::first();
    $course = $user->courses->first();

    $materials = $course->materials;

    dd($materials);
});
