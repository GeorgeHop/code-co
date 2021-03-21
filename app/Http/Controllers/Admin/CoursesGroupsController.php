<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class CoursesGroupsController extends Controller
{
    public function edit(Course $course, Group $group)
    {
        return view('admin.pages.coursesGroups.edit', [
            'users' => User::all(),
            'course' => $course,
            'group' => $group,
            'edit' => true
        ]);
    }

    public function update(Course $course, Group $group)
    {
        $group->update($this->validateData());
        return back();
    }

    public function create(Course $course)
    {
        return view('admin.pages.coursesGroups.edit', [
            'course' => $course,
            'group' => new Group(),
            'edit' => false
        ]);
    }

    public function store(Course $course)
    {
        $course->groups()->create($this->validateData());
        return back();
    }

    public function addUserToGroup(Course $course, Group $group)
    {
        $group->users()->attach(request()->user_id);
        return back();
    }

    public function deleteUserFromGroup(Course $course, Group $group, User $user)
    {
        $group->users()->detach($user);
        return back();
    }

    public function destroy(Course $course, Group $group)
    {
        $group->users()->detach();
        $group->delete();
        return back();
    }

    protected function validateData() {
        return request()->validate([
            'name' => ['required', 'min:3', 'max:50'],
        ]);
    }
}
