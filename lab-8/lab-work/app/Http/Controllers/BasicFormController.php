<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicFormController extends Controller
{
    public function formSubmitted(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

        // If the form data is valid, then redirect to the user-info.blade.php view
        return view('task1.user-info', [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);
    }
}
