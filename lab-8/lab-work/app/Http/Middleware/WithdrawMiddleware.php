<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WithdrawMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Withdraw is possible when there is available balance
        if ($request->input('action') === 'withdraw') {
            // Get the current balance from the session
            $balance = session('balance', 0);
            
            // Checking if the withdraw amount is within 0 to 1000
            if ($request->input('amount') < 0 || $request->input('amount') > $balance) {
                return response('Withdraw amount must be between 0 and the available balance', 400);
            }
        }
        return $next($request);
    }
}
