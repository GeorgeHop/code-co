<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(Course $course, Post $post)
    {
        return view('welcome', [
            'courses' => $course->where('is_on_homepage', 1)->take(4)->latest()->get(),
            'posts' => $post->where('is_on_homepage', 1)->take(6)->latest()->get()
        ]);
    }
}
