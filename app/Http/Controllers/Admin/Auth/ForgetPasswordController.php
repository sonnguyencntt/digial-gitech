<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\Admin\SendEmailVerifyResetPassword;
use App\Admin;
use Illuminate\Http\Request;
use Hash;
class ForgetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    public function __construct()
    {
        $this->middleware('guest:admin');
    }


    public function index()
    {
        return \view("pages.admin.auth.forget_password");
    }
    public function postForgetPass(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:admins'
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ Email hợp lệ',
            'email.exists' => 'Email không tồn tại trong hệ thống'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        $token = \strtoupper(\Str::random(10));
        $admin->token = $token;
        try {
            $admin->save();
            SendEmailVerifyResetPassword::dispatch($admin);
            return \redirect()->back()->with(["message" => "Đã gửi", "status_code" => "success"]);
        } catch (\Throwable $th) {
            \Log::channel("jobs")->info($th);
            return \redirect()->back()->with(["message" => "Đã xãy ra lỗi", "status_code" => "danger"]);
        }
    }
    public function resetPassword(Admin $admin, $token)
    {
        if ($admin->token === $token) {
            return \view("pages.admin.auth.reset_password");
        } else {
            return \redirect()->route("admin.forget_password.index")->with(["message" => "Mã xác thực không đúng", "status_code" => "danger"]);
        }
    }
    public function postResetPassword(Admin $admin, $token, Request $request)
    {
        if ($admin->token === $token) {
            $request->validate([
                'password' => 'required',
                'confirm_password' => 'required|same:password'
            ], [
                'password.required' => 'Vui lòng nhập mật khẩu hợp lệ',
                'confirm_password.required' => 'Vui lòng nhập lại mật khẩu hợp lệ',
                'confirm_password.same' => 'Nhập lại mật khẩu không đúng'
            ]);
    
            try {
                $newPassword =  Hash::make($request->password);
                $admin->update(['password'=>$newPassword, 'token' => null]);
                return \redirect()->route("admin.login.index")->with(["message" => "Đặt lại mật khẩu thành công", "status_code" => "success"]);
            } catch (\Throwable $th) {
                return \redirect()->route("admin.login.index")->with(["message" => "Đặt lại mật khẩu không thành công" , "status_code" => "danger"]);
            }
        }
        

    }
}
