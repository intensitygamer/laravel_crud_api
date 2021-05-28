<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Illuminate\Support\Facades\Auth;

class CheckIsAdmin extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        
    }
}
