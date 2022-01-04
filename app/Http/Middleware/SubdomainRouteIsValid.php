<?php

namespace App\Http\Middleware;

use Closure;

class SubdomainRouteIsValid
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
        $list_url = array("super" , "administrator" , "");
        $server_name = $_SERVER['SERVER_NAME'];
        $domain_name = str_replace(".".\env("DOMAIN_NAME"),"",$server_name);
        if(in_array($domain_name , $list_url) or $server_name == \env("DOMAIN_NAME")  )
        {
        return $next($request);

        }
        else
        {
            \abort(404);
        }
    }
}
