<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursesVideo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPanelController extends Controller
{
    public function index()
    {
        return view('user.pages.UserPanel.user_main', ['courses' => Auth::user()->courses]);
    }

    public function show(Course $course, CoursesVideo $video)
    {
        return view('user.pages.UserPanel.user_course_list', ['course' => $course, 'video' => $video]);
    }
}
