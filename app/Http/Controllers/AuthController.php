<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('user.pages.Login&Registration.login');
    }

    public function showRegistration()
    {
        return view('user.pages.Login&Registration.registration');
    }

    public function signup(Request $request)
    {
        $userHaveAccount = User::where('email', '=', $request->input('email'))->exists();

        if ($userHaveAccount) {
            return back()->with('message', 'Пользователь с таким email уже зарегестрирован');
        }

        request()->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|min:5|max:35',
            'password' => 'required|min:5|max:40|confirmed',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect('/confirm');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect($request->intended ?? route('user.panel'));
        }

        return back()->with('message', 'Ошибка. email или пароль введены не правильно');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/login');
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
