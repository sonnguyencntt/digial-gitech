<?php

namespace App\Http\Middleware;

use App\Store;
use Closure;

class CheckForCustomerStoreCode
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
        $store_code = $request->store_code;
        if (isset($store_code)) {
            $result = Store::where("store_code", $store_code)->first();
            if ($result) {
                if ($result->status == "WORKING") {
                    return $next($request);
                }
                
            }
            return \response()->view("errors.404" , ["msg" => "Trang web tạm thời không hoạt động, vui lòng quay lại sau"] , 403);
        }
        return $next($request);
    }
}
