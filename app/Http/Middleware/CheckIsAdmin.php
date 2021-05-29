<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class CheckIsAdmin extends Middleware   
{
    /**
     * Get the path the user should be redirected to when they are not admin.
     *
     * @param  \Illuminate\Http\Request  $request
    *  @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        return $next($request);

    }
}
