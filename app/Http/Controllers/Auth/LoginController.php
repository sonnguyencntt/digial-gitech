<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class LoginController extends Controller
{
    
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('guest' ,  ['except' => ['logout']]);
        }
    
        public function login(Request $request)
        {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);
            $credentials = $request->only('email', 'password');
            if(Auth::guard()->attempt($credentials))
            {
                return \redirect()->intended(route('user.home.index'));
            }
            return \redirect()->back()->withInput()->withErrors("Tài khoản hoặc mật khẩu không tồn tại");
        }
    
        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            return view('pages.user.auth.index');
        }

        public function logout(Request $request) {
            Auth::logout();
            return redirect()->route("user.login.index");
          }
}
