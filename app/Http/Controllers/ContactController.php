<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|min:3|max:30',
            'email' => 'required|email',
            'message' => 'required|'
        ]);

        Contact::create($request->all());
    }
}
