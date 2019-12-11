<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class CustomerAuth
{
/**
 * Handle an incoming request.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Closure  $next
 * @param  string|null  $guard
 * @return mixed
 */
public function handle($request, Closure $next, $guard = 'customer')
{
    if (!Auth::guard($guard)->check()) {
        return redirect('/');
    }

    return $next($request);
}
}
?>