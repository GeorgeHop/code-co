<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('admin.pages.courses.edit');
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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
