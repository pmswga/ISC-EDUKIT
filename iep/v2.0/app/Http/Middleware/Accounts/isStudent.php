<?php

namespace App\Http\Middleware\Accounts;

use Closure;
use Illuminate\Support\Facades\Auth;

class isStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->id_account_type !== 3) {
            return back();
        }   
        
        return $next($request);
    }
}
