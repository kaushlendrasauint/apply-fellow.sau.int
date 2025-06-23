<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $pp = $request->path();

        if($pp=='SignIn' && Session::get('user'))
        {
            return redirect('step1');
        }
        if($pp!="SignIn" && !Session::get('user'))
        {
            return redirect('SignIn');
        }

        return $next($request);
    }
}
