<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursesMaterial;
use App\Models\CoursesVideo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(Course $course)
    {
       return view('user.pages.Courses.courses', ['courses' => $course->get()]);
    }

    public function show(Course $course)
    {
        return view('user.pages.Courses.courses_single', [
            'course' => $course->loadMissing('offers'),
            'videos' => $course->videos()->orderBy('video_number')->with('materials')->get()
        ]);
    }
}
