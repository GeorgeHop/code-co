<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CoursesVideo;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function create($course, CoursesVideo $video)
    {
        return view('admin.pages.courses.edit_video', ['video' => $video, 'course' => $course, 'edit' => false]);
    }

    public function store(Course $course)
    {
        $data = $this->validateData();
        $course->videos()->create($data);
        return redirect(route('admin.courses.edit', $course->id));
    }

    public function edit(Course $course, CoursesVideo $video)
    {
        return view('admin.pages.courses.edit_video', ['video' => $video, 'course' => $course, 'edit' => true]);
    }

    public function update($course, CoursesVideo $video)
    {
        $validatedData = $this->validateData();
        $validatedData['is_preview'] = request()->is_preview ? 1 : 0;
        $video->update($validatedData);
        return redirect(route('admin.courses.index'));
    }

    public function destroy($course, CoursesVideo $video)
    {
        $video->delete();
        return redirect(route('admin.courses.index'));
    }

    public function validateData()
    {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:8'],
            'source' => ['required'],
            'video_number' => ['required']
        ]);
    }
}
