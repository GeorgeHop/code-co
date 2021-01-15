<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
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
        $courseIDs = $user->courses()->pluck('course_id');
        return view('admin.pages.users.edit', [
            'user' => $user,
            'courses' => Course::orderBy('name')->whereNotIn('id', $courseIDs)->get(['id', 'name']),
            'edit' => true,
        ]);
    }

    public function update()
    {

    }

    public function subscribeCourse(User $user)
    {
        $user->courses()->attach(request()->course_id);
        return back();
    }

    public function unsubscribeCourse(User $user, $course)
    {
        $user->courses()->detach($course);
        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('admin.users.index');
    }
}
