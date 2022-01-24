<?php

namespace App\Http\Middleware;

use Closure;
use App\Store;
use Auth;
class CheckForExsitStore
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
        if(isset($store_code))
        {
            $user_id = Auth::user()->id;
            $result = Store::where("user_id",  $user_id)->where("store_code",$store_code)->first();
            if($result)
            return $next($request);
            return \redirect()->route("manage.home.show_stores")->with(["status" => 403 , "msg"=> "Bạn không có quyền truy cập" , "alert"=>"danger"]);
        }
        return \redirect()->route("manage.home.show_stores")->with(["status" => 403 , "msg"=> "Bạn không có quyền truy cập" , "alert"=>"danger"]);
    }
}
