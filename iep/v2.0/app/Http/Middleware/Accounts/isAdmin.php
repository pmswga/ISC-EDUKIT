<?php

namespace App\Http\Middleware\Accounts;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->id_account_type !== 6) {
            return back();
        }
        
        return $next($request);
    }
}
