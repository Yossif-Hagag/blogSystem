<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkAuth2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
    if (auth()->check() && auth()->user()->type == 'user') {
        return redirect('/home');
    }
    
    return $next($request);
    }
}
