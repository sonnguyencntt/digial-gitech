<?php

namespace App\Http\Middleware;

use Closure;

class CustomDomain
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
        $domain = $request->getHost();
        \dd($domain);
        // $tenant = Tenant::where('domain', $domain)->firstOrFail();

        // $request->merge([
        //     'domain' => $domain,
        //     'tenant' => $tenant
        // ]);

       
        // View::share('tenantColor', $tenant->color);
        // View::share('tenantName', $tenant->name);

        return $next($request);    }
}
