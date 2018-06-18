<?php

namespace App\Http\Middleware\Accounts;

use Closure;
use Illuminate\Support\Facades\Auth;

class isParent
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->id_account_type !== 5) {
            return back();
        }

        return $next($request);
    }
}
