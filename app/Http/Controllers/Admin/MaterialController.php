<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CoursesMaterial;
use App\Models\CoursesVideo;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function create($course, $video, CoursesMaterial $material)
    {
        return view('admin.pages.courses.edit_material', ['course' => $course, 'video' => $video, 'material' => $material, 'edit' => false]);
    }

    public function store(Course $course, CoursesVideo $video)
    {
        $validatedData = $this->validateData();
        $video->materials()->create($validatedData);
        return redirect(route('admin.videos.edit', [$course->id, $video->id]));
    }

    public function edit(Course $course, CoursesVideo $video, CoursesMaterial $material)
    {
        return view('admin.pages.courses.edit_material', ['course' => $course, 'video' => $video, 'material' => $material, 'edit' => true]);
    }

    public function update($course, $video, CoursesMaterial $material)
    {
        $validatedData = $this->validateData();
        $material->update($validatedData);
        return redirect(route('admin.videos.edit', [$course, $video]));
    }

    public function destroy($course, $video, CoursesMaterial $material)
    {
        $material->delete();
        return redirect(route('admin.courses.index'));
    }

    public function validateData()
    {
        return request()->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:10',
        ]);
    }
}
