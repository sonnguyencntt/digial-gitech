@extends('layouts.admin.auth')
@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="auth"><b>Forgot Password</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      
      <p class="login-box-msg">Vui lòng điền Email mà bạn đã đăng kí trước đó</p>
      @if(\Session::has('flag'))
      <div class="alert alert-{{\Session::get('flag')}}">
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
    
  
  
        
  
      
      <form action="{{route('manage.auth.forgot')}}" method="post">
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
       
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <a href="{{route('manage.auth.index')}}">Quay về</a>

            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
           

            <button type="submit" class="btn btn-primary btn-block btn-flat">Gửi Mail</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
  
    </div>
    <!-- /.login-box-body -->
  </div>
  @stop