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
            \abort(404);
            // return "Đang cập nhật, trang web hiện tại không hoạt động!!";
        }
        return $next($request);
    }
}
