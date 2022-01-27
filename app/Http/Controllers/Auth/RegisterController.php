<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Mail;
use App\Jobs\User\SendMailVerifyRegisterJob;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }


    public function index()
    {
        return view('pages.user.auth.register');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'regex:/(01)[0-9]{9}/', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => 'required|same:password'

        ],
        [
            "email.unique" => "Đã tồn tại email này trong hệ thống",
            "phone_number.unique" => "Đã tồn tại Phone này trong hệ thống",

        ]
    );

        try {
            $token = \strtoupper(\Str::random(10));
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'phone_number' => $request->phone_number,

                'status' => 0,
                'token'=>$token
            ]);
            try {
                return \redirect()->route("user.register.verify_email" , ["user" => $user->id])->with(["message"=>"Gửi mail thành công" , "status_code"=>"success"]);

            } catch (\Throwable $th) {
                return \redirect()->route("user.register.verify_email" , ["user" => $user->id])->with(["message"=>"Gửi mail không thành công" , "status_code"=>"danger"]);
            }
        } catch (\Throwable $th) {
            return \redirect()->back()->with("message", "Đăng ký tài khoản không thành công");
        }
    }

    public function verifyEmail(User $user)
    {
     try {
        $this->sendMail($user);
        return view('pages.user.auth.register_verify_email' , \compact("user"));
     } catch (\Throwable $th) {
     }
  
    }
    public function sendMail($user)
    {
        SendMailVerifyRegisterJob::dispatch($user);
    }
    public function sendMailVerifyRegister(Request $request)
    {

        $user = \Auth::user();

        $token = \strtoupper(\Str::random(10));
        $user->token = $token;
        try {
            $user->save();
            $this->sendMail($user);
            return \redirect()->back()->with(["message" => "Đã gửi" , "status_code" => "success"]);

        } catch (\Throwable $th) {
            return \redirect()->back()->with(["message" => "Đã xãy ra lỗi" , "status_code" => "danger"]);
        }
    }
    public function checkTokenVerifyRegister(User $user, $token)
    {
        if ($user->token === $token) {
            $user->update(['status' => 1 , "token" =>null]);
            return \redirect()->route("user.home.index")->with(["message" => "Xác thực tài khoản thành công" , "status_code" => "success"]);
        } else {
            return \redirect()->route("user.register.verify_email")->with(["message" => "Mã xác thực không đúng" , "status_code" => "danger"]);
        }
    }
}
