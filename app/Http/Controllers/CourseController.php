<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursesMaterial;
use App\Models\CoursesVideo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function main(Course $course)
    {
        return view('welcome', ['courses' => $course->where('is_on_homepage', 1)->take(4)->latest()->get()]);
    }

    public function index(Course $course)
    {
       return view('user.pages.courses.courses', ['courses' => $course->get()]);
    }

    public function show(Course $course)
    {
        return view('user.pages.courses.courses_single', [
            'auth_user_courses' => Auth::user()->courses,
            'course' => $course->loadMissing('videos.materials'),
            'offers' => $course->loadMissing('offers')
        ]);
    }
}
