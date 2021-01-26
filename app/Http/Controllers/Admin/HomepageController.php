<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MenuItems\Courses;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function dashboard(Course $course, User $user) {
        return view('admin.pages.dashboard', ['courses' => $course->all(), 'users' => $user->all()]);
    }

    public function update() {

    }
}
