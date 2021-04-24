<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index(Social $social)
    {
        return view('admin.pages.siteSettings.site_data', ['socials' => $social->all()]);
    }

    public function edit(Social $social)
    {
        return view('admin.pages.siteSettings.edit_social', ['social' => $social, 'edit' => true]);
    }

    public function update(Social $social)
    {
        $social->update($this->validateData());
        return redirect(route('admin.socials.index'));
    }

    public function create()
    {
        return view('admin.pages.siteSettings.edit_social', ['social' => new Social(), 'edit' => false]);
    }

    public function store()
    {
        Social::create($this->validateData());
        return redirect(route('admin.socials.index'));
    }

    public function destroy(Social $social)
    {
        $social->delete();
        return redirect(route('admin.socials.index'));
    }

    public function validateData()
    {
        return request()->validate([
            'name' => ['required', 'min:3', 'max:60'],
            'description' => ['required', 'min:10'],
            'link' => ['required', 'min:3', 'max:30'],
        ]);
    }
}
