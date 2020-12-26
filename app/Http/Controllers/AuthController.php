<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function Login(Request $request)
    {
        return view('Login&Registration.login');
    }

    public function Registration(Request $request)
    {
        return view('Login&Registration.registration');
    }
}
