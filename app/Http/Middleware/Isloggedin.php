<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Isloggedin
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
        if(!Session::has('userid')){
            return redirect('/');
        }
        return $next($request);
    }
}