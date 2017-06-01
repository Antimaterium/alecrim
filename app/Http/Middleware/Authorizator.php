<?php

namespace alecrim\Http\Middleware;

use Closure;
use Auth;

class Authorizator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if (!$request->is('login') && Auth::guest()) {
        //     return redirect('login');
        // }

        return $next($request);
    }
}
