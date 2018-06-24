<?php

namespace App\Http\Middleware\Accounts;

use Closure;
use Illuminate\Support\Facades\Auth;

class isUnitManager
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->id_account_type !== 1) {
            return back();
        }

        return $next($request);
    }
}
