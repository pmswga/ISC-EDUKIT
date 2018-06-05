<?php

namespace App\Http\Middleware\UserType;

use Closure;
use Illuminate\Auth;

class isDirector
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
        if (\Auth::user()->id_type_user !== 1) {
            return back();
        }

        return $next($request);
    }
}
