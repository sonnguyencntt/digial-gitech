@extends('layouts.user.auth')
@section('content')
<div class="login-box">
    <div class="login-logo">
      <a ><b>Register</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      
      <p class="login-box-msg">Administrator</p>
      @if(\Session::has('message'))
      <div class="alert alert-danger">
        <ul>
                <li>{{ \Session::get('message') }}</li>
            
        </ul>
    </div>
    <br>

      @endif
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
    
  
  
        
  
      
      <form action="{{route('user.register.store')}}" method="post">

        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="name" id="email" value="{{old("name")}}" placeholder="Tên" autocomplete="off" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="phone_number" id="email" value="{{old("phone_number")}}" placeholder="Số điện thoại" autocomplete="off" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{old("email")}}" autocomplete="off" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="address" id="Địa chỉ" placeholder="Địa chỉ"  value="{{old("address")}}"autocomplete="off" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" id="password" placeholder="password" autocomplete="off" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="confirm_password" id="password" placeholder="Nhập lại mật khẩu" autocomplete="off" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
              <a href="{{route('user.login.index')}}">Đã có tài khoản, Đăng nhập</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
  
    </div>
    <!-- /.login-box-body -->
  </div>
  @stop