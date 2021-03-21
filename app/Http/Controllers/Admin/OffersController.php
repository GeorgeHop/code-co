<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CoursesOffer;
use App\OfferTypes;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function edit(Course $course, CoursesOffer $offer)
    {
        return view('admin.pages.courses.edit_offer', [
            'offer' => $offer,
            'course' => $course,
            'edit' => true
        ]);
    }

    public function update($course, CoursesOffer $offer)
    {
        $offer->update($this->validateData());
        return redirect(route('admin.courses.index'));
    }

    public function create(CoursesOffer $offer, Course $course, OfferTypes $types)
    {
        return view('admin.pages.courses.edit_offer', [
            'offer' => $offer,
            'course' => $course,
            'offer_types' => $types->all(),
            'edit' => false
        ]);
    }

    public function store(Course $course)
    {
        $course->offers()->create($this->validateData());
        return back();
    }

    public function destroy($course, CoursesOffer $offer)
    {
        $offer->delete();
        return back();
    }

    public function validateData()
    {
        return request()->validate([
            'title' => ['required', 'min:3', 'max:30'],
            'description' => ['required', 'min:5', 'max:150'],
            'cost' => ['required', 'min:1'],
            'currency' => ['required'],
            'type' => ['required']
        ]);
    }

}
