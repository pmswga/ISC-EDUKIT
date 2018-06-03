<?php

namespace App\Http\Middleware\UserType;

use Closure;
use Illuminate\Auth;

class isParent
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
        if (\Auth::user()->id_type_user !== 5) {
            return redirect()->route('index');
        }

        return $next($request);
    }
}
