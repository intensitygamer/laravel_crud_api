<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isMasterAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        
        if (!Auth::check() || $user['user_type_id'] != 1 ) {
            return redirect('login');
        }

        return $next($request);
    }
}
