<?php

namespace App\Http\Middleware;

use Closure;
use App\Store;
use Auth;
class CheckForStatusStore
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
            $result = Store::where("store_code",$store_code)->first();
            if($result->status == "WAITING")
            return \redirect()->route("user.home.show_stores")->with(["status" => 403 , "msg"=> "Cửa hàng $result->name " . "đang chờ xét duyệt từ hệ thống, vui lòng chờ!" , "alert"=>"danger" ]);
            else if($result->status == "STOP_WORKING")
            return \redirect()->route("user.home.show_stores")->with(["status" => 403 , "msg"=> "Shop của bạn đã ngừng hoạt động do không toán đúng hạn hoạc lỗi gì đó xãy ra, vui lòng liên hệ admin!" , "alert"=>"danger"]);
            else
            return $next($request);


        }
        return \redirect()->route("user.home.show_stores")->with(["status" => 403 , "msg"=> "Bạn không có quyền truy cập" , "alert"=>"danger"]);
    }
}
