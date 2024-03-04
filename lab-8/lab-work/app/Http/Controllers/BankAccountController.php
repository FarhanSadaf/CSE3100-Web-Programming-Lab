<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function show()
    {
        // Get the current balance from the session
        $balance = session('balance', 0);

        // Return the view, passing the balance with it
        return view('bank-account-form', ['balance' => $balance]);
    }

    public function update(Request $request)
    {
        // Get the current balance from the session
        $balance = session('balance', 0);

        // Checking if deposit or withdraw
        if ($request->input('action') === 'withdraw') {
            // Subtract the withdraw amount from the balance
            $balance -= $request->input('amount');
        } 
        else if ($request->input('action') === 'deposit'){
            // Add the deposit amount to the balance
            $balance += $request->input('amount');
        }

        // Store the updated balance in the session
        session(['balance' => $balance]);
        /*
        // Or 
        $request->session()->put('balance', $balance);
        */

        // Redirect back to the form
        return redirect('/bank-account');
    }
}
