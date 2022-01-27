<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class RegisterVerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $guard=null)
    {
        $guard = $guard == null ? "web" : $guard;
        if(Auth::guard($guard)->user()->status == 1)
        return $next($request);
        else
        return \redirect()->route("user.register.verify_email" , ["user" =>Auth::guard($guard)->user()->id]);
    }
}
