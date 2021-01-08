<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        return view('admin.pages.courses.list', ['courses' => Course::where('author_id', '=', Auth::id())->latest()->paginate()]);
    }

    public function show()
    {
        return view('admin.pages.courses.single_course_list');
    }

    public function update()
    {

    }

    public function create(Course $course)
    {
        return view('admin.pages.courses.edit', ['course' => $course, 'edit' => false]);
    }

    public function store(Request $request)
    {
        $file = $request->file('thumbnail');
        if ($file) {
            $path = $file->store('courses/thumbnails');
            dd($path);
        }
        dd($file);
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect(route('admin.courses.index'));
    }
}
