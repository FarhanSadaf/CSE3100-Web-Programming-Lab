<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request) 
    {
        // Checking if request has email
        if ($request->has('email')) {
            // Get the email from the request
            $email = $request->input('email');

            // Store the email in the cookie
            $minutes = 5;
            cookie()->queue(cookie('email', $email, $minutes));
            return redirect()->route('home');
            
            /*
            // Or
            return redirect()->route('home')->withCookie(cookie('email', $email, $minutes));
            */
        }

        return view('task2.home');
    }

    public function logout() 
    {
        // Delete the email cookie
        cookie()->queue(cookie('email', '', -1));

        /*
        // Or
        cookie()->queue(cookie()->forget('email'));
        */
        return redirect()->route('home');
    }
}
