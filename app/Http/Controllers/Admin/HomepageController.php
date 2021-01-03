<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function dashboard() {
        return view('admin.pages.dashboard');
    }

    public function update() {

    }
}
