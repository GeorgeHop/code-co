<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Course $course)
    {
       return view('user.pages.courses.courses', ['courses' => $course->get()]);
    }

    public function show(Course $course)
    {
        return view('user.pages.courses.courses_single', ['course' => $course]);
    }
}
