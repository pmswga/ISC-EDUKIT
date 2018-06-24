<?php

namespace App\Http\Middleware\Accounts;

use Closure;
use Illuminate\Support\Facades\Auth;

class isElder
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->id_account_type !== 4) {
            return back();
        }

        return $next($request);
    }
}
