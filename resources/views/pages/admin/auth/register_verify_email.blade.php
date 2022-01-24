@extends('layouts.admin.auth')
@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="auth"><b>Xác thực Email</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      
      <p class="login-box-msg">Administrator</p>
      <p >Tài khoản của bạn chưa được kích hoạt, vui lòng thực hiện đăng nhập vào tài khoản gmail <strong> {{$user->email}} </strong> để thực hiện xác thực</p>

      @if(\Session::has('message'))
      <div class="alert alert-{{\Session::get('status_code')}}">
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
    
  
  
        
</li>
<form id="form_logout" method="post" action="{{route("manage.logout")}}">
    @csrf
    
</form>

      
      <form action="{{route('manage.register.send_verify_email')}}" method="post">
        @csrf
          <input type="hidden" class="form-control" value="{{$user->email}}" name="email" id="Nhập Email" placeholder="Email" autocomplete="off" required>
   
        <div class="row">
    
          <!-- /.col -->
          <div  style="display:flex ; float : right">
            <button type = "button" onclick="$('#form_logout').submit();" class="btn btn-danger btn-block btn-flat">Thoát</button>

            <button type="submit" class="btn btn-primary btn-block btn-flat">Gửi lại</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
  
    </div>
    <!-- /.login-box-body -->
  </div>
  @stop