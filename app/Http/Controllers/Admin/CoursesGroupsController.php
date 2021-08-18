<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Group;
use App\Models\User;
use App\Notifications\AddedToGroup;
use App\Notifications\CourseStarted;

class CoursesGroupsController extends Controller
{
    public function edit(Course $course, Group $group, User $user)
    {
        $groupUsersIDs = $group->users()->pluck('user_id');

        return view('admin.pages.coursesGroups.edit', [
            'users' => User::orderBy('name')->whereNotIn('id', $groupUsersIDs)->get(),
            'course' => $course,
            'group' => $group,
            'edit' => true
        ]);
    }

    public function update(Course $course, Group $group)
    {
        $validatedData = $this->validateData();
        $isLaunch = request()->is_launch ? 1 : 0;
        $validatedData['launch_date'] = request()->launch_date;
        $validatedData['is_launch'] = $isLaunch;
        $notificationData = [
          'course' => $course,
          'group' => $group
        ];

        if ($isLaunch) {
            foreach ($group->users as $user) {
                $user->notify(new CourseStarted($notificationData));
            }
        }
        $group->update($validatedData);

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
        $result = $course->groups()->create($this->validateData());
        $result->videos()->attach($course->videos);
        return back();
    }

    public function addUserToGroup(Course $course, Group $group)
    {
        $user = User::where('id', request()->user_id)->get();
        $notifyData = [
            'user' => $user[0],
            'group' => $group,
            'course' => $course
        ];

        $group->users()->attach(request()->user_id);
        $user[0]->notify(new AddedToGroup($notifyData));

        return back();
    }


    public function deleteUserFromGroup(Course $course, Group $group, User $user)
    {
        $group->users()->detach($user);
        return back();
    }

    public function destroy(Course $course, Group $group)
    {
        $group->videos()->detach();
        $group->users()->detach();
        $group->delete();
        return back();
    }

    protected function validateData() {
        return request()->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'launch_date' => ['max:15']
        ]);
    }
}
