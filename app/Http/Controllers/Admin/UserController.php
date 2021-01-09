<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.pages.users.list', ['users' => User::latest()->paginate()]);
    }

    public function edit(User $user)
    {
        return view('admin.pages.users.edit', ['user' => $user, 'edit' => true]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('admin.users.index');
    }
}
