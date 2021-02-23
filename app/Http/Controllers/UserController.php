<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        return view('user.pages.UserPanel.user_profile', ['user' => Auth::user()]);
    }

    public function update(User $user)
    {
        $user->update(request()->validate([
            'name' => ['required', 'min:3', 'max:30']
        ]));

        return redirect(route('user.profile'));
    }
}
