<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LiveChatController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPanelController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

Route::get('/', [HomepageController::class, 'index'])->name('main');
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

Route::post('/email/verify', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back();
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::view('/email-not-verified', 'user.pages.Login&Registration.confirm')->middleware('auth')->name('verification.notice');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/generate-payment', [PaymentsController::class, 'generate'])->name('payments.generate');
    Route::post('/approve-payment', [PaymentsController::class, 'approve']);
    Route::get('/user-panel/courses', [UserPanelController::class, 'index'])->name('user.panel');
    Route::get('/user-panel/player/{video}', [UserPanelController::class, 'show'])->name('user.player');
    Route::get('/user-panel/profile', [UserController::class, 'edit'])->name('user.profile');
    Route::put('/user-panel/profile/{user}', [UserController::class, 'update'])->name('user.update');
});

// forgot password view
Route::get('/forgot-password', function () {
    return view('user.pages.Login&Registration.password_reset_request_form');
})->middleware('guest')->name('password.reset.request');

Route::post('/forgot-password', function(Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->name('password.reset.post');

Route::get('/reset-password/{token}', function($token) {
    return view('user.pages.Login&Registration.password_reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function(Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:5|confirmed'
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),

        function($user, $password) use ($request) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();
            $user->setRememberToken(Str::random(60));
            event(new PasswordReset($user));
        }
    );

    return $status == Password::PASSWORD_RESET
        ? redirect(route('login'))->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update.post');

Route::post('live-chat/send', [LiveChatController::class, 'send'])->name('live-chat.send');

Route::get('/test', function () {
    $user = \App\Models\User::first();
    $course = $user->courses->first();

    $materials = $course->materials;

    dd($materials);
});
