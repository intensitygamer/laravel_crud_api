<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateAPI
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

         
        //*  Check token from CRM

        $client_info = Client::where(['crm_token_id' => $request->crm_token_id);

        if($client_info){
            
        }


        // if ($request ) {
        //     return redirect('login');
        // }

        return $next($request);
    }


}
