<?php

//This middleware is from James, so that you can send an axios request for thr Gif. Without this it sends
//an axios request error. This middleware was created through the terminal in the main project(php artisan make:middleware Cors)
namespace App\Http\Middleware;

use Closure;

class Cors
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
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', '*'); //semicolon only on last line
    }
}
