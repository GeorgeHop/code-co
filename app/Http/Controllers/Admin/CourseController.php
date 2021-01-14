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

    public function edit(Course $course)
    {
        return view('admin.pages.courses.edit', ['course' => $course->loadMissing('videos.materials'), 'edit' => true] );
    }

    public function update(Course $course)
    {
        $course->update($this->insertCustomData());
        return redirect(route('admin.courses.index'));
    }

    public function create(Course $course)
    {
        return view('admin.pages.courses.edit', ['course' => $course->loadMissing('videos.materials'), 'edit' => false]);
    }

    public function store()
    {
        Course::create($this->insertCustomData());
        return redirect(route('admin.courses.index'));
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect(route('admin.courses.index'));
    }

    public function insertCustomData()
    {
        $validatedCourse = $this->validateData();
        $validatedCourse['author_id'] = Auth::id();
        $validatedCourse['is_on_homepage'] = request()->is_on_homepage ? 1 : 0;

        return $validatedCourse;
    }

    public function validateData()
    {
        return request()->validate([
            'name' => 'required|min:3|max:30',
            'info' => 'required|min:10|max:300',
            'duration' => 'required|min:1',
            'is_on_homepage' => 'nullable',
            'cost' => 'required',
            'thumbnail' => 'string'
        ]);
    }
}
