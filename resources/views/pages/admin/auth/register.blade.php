@extends('layouts.admin.auth')
@section('content')
<div class="login-box">
    <div class="login-logo">
      <a ><b>Register</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      
      <p class="login-box-msg">Administrator</p>
      @if(\Session::has('flag'))
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
    
  
  
        
  
      
      <form action="{{route('manage.register.store')}}" method="post">

        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="name" id="email" placeholder="Tên" autocomplete="off" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="phone_number" id="email" placeholder="Số điện thoại" autocomplete="off" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="address" id="Địa chỉ" placeholder="Địa chỉ" autocomplete="off" required>
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
              <a href="{{route('manage.login.index')}}">Đã có tài khoản, Đăng nhập</a>
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