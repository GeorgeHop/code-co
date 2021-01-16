<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursesMaterial;
use App\Models\CoursesVideo;

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
        return view('user.pages.courses.courses_single', ['course' => $course->loadMissing('videos.materials')]);
    }

    public function showBuy(Course $course)
    {
        return view('user.pages.courses.courses_type', ['course' => $course->loadMissing('videos.materials')]);
    }
}
