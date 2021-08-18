<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use App\OfferTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        return view('admin.pages.courses.list',
            [
                'courses' => Course::where('author_id', '=', Auth::id())->latest()->paginate(),
            ]);
    }

    public function edit(Course $course)
    {
        return view('admin.pages.courses.edit', [
            'course' => $course,
            'videos' => $course->videos()->orderBy('video_number')->get(),
            'offers' => $course->loadMissing('offers'),
            'groups' => $course->loadMissing('groups'),
            'edit' => true
        ]);
    }

    public function update(Course $course)
    {
        $course->update($this->insertCustomData());
        return back();
    }

    public function create(Course $course)
    {
        return view('admin.pages.courses.edit', [
            'course' => $course->loadMissing('videos.materials'),
            'offers' => $course->loadMissing('offers'),
            'edit' => false
        ]);
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
            'name' => 'required|min:3|max:130',
            'info' => 'required|min:10|max:2000',
            'duration' => 'required|min:1',
            'is_on_homepage' => 'nullable',
            'thumbnail' => 'string'
        ]);
    }
}
