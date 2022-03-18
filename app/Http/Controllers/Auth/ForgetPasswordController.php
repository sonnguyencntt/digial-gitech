<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Jobs\user\SendEmailVerifyResetPassword;
use App\User;
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
        $this->middleware('guest');
    }


    public function index()
    {
        return \view("pages.user.auth.forget_password");
    }
    public function postForgetPass(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users'
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ Email hợp lệ',
            'email.exists' => 'Email không tồn tại trong hệ thống'
        ]);

        $user = User::where('email', $request->email)->first();

        $token = \strtoupper(\Str::random(10));
        $user->token = $token;
        try {
            $user->save();
            SendEmailVerifyResetPassword::dispatch($user);
            return \redirect()->back()->with(["message" => "Đã gửi", "status_code" => "success"]);
        } catch (\Throwable $th) {
            \Log::channel("jobs")->info($th);
            return \redirect()->back()->with(["message" => "Đã xãy ra lỗi", "status_code" => "danger"]);
        }
    }
    public function resetPassword(User $user, $token)
    {
        if ($user->token === $token) {
            return \view("pages.user.auth.reset_password");
        } else {
            return \redirect()->route("user.forget_password.index")->with(["message" => "Mã xác thực không đúng", "status_code" => "danger"]);
        }
    }
    public function postResetPassword(User $user, $token, Request $request)
    {
        if ($user->token === $token) {
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
                $user->update(['password'=>$newPassword, 'token' => null]);
                return \redirect()->route("user.login.index")->with(["message" => "Đặt lại mật khẩu thành công", "status_code" => "success"]);
            } catch (\Throwable $th) {
                return \redirect()->route("user.login.index")->with(["message" => "Đặt lại mật khẩu không thành công" , "status_code" => "danger"]);
            }
        }
        

    }
}
