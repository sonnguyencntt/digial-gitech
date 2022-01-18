@extends('layouts.super.auth')
@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="auth"><b>Login</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      
      <p class="login-box-msg">Super Administrator</p>
      @if(\Session::has('message'))
      <div class="alert alert-{{ \Session::get('status_code') }}">
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
    
  
  
        
  
      
      <form action="{{route('super.login.store')}}" method="post">
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="">
              <label>
                <a href="{{route('super.forget_password.index')}}">Forgot password ?</a>
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