<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWT // we created our own middleware for JWT 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) //giving an line of exception in case smth goes wrong
    {
        JWTAuth::parseToken()->authenticate();
        return $next($request);
    }
}
