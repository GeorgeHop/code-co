<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPanelController extends Controller
{
    public function index()
    {
        return view('user.pages.UserPanel.user_main', ['courses' => Auth::user()->courses]);
    }
}
