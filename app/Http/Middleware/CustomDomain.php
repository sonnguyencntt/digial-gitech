<?php

namespace App\Http\Middleware;

use Closure;
use App\Store;
use App\Theme;

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
        $store_code = \getStoreCode();

        if ($store_code) {
            $store = Store::where("store_code", $store_code)->first();

            if ($store) {

                $request->merge([
                    'store_code' => $store_code,
                ]);
                return $next($request);
            } else {
                $theme = Theme::where("domain", $request->getHost())->first();
                if ($theme) {
                    $request->merge([
                        'store_code' => $theme->store_code,
                    ]);
                    return $next($request);
                }
            }
        }

        return \response()->view("errors.404", ["msg" => "Trang web tạm thời không hoạt động, vui lòng quay lại sau"], 403);


        // View::share('tenantColor', $tenant->color);
        // View::share('tenantName', $tenant->name);

    }
}
