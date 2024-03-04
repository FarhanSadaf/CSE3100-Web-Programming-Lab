<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepositMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Checking if deposit or withdraw
        if ($request->input('action') === 'deposit') {
            // Checking if the deposit amount is within 0 to 1000
            if ($request->input('amount') < 0 || $request->input('amount') > 1000) {
                return response('Deposit amount must be between 0 and 1000', 400);
            }
        }
        return $next($request);
    }
}
