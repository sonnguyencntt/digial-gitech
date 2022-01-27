@extends('layouts.user.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chỉnh sửa
        <small>{{$title}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Bảng điều khiển</a></li>
        <li class="active">Chỉnh sửa {{$title}}</li>
      </ol>
    </section>

    <!-- Main content -->



    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
    
          
          @include('components.user.popup_error')

    
    
    
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$title}}</h3>
            </div>
            <!-- /.box-header -->
            <form role="form" action="{{route("user.profile.update" , $user->id)}}" method="POST" >
              @csrf
              @method('put')
              <div class="box-body">

                
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}" autocomplete="off" readonly>

              </div>                

                <div class="form-group">
                  <label for="username">Họ và tên</label>
                  <input type="text" class="form-control" id="username" name="name" placeholder="Tên người dùng" value="{{$user->name}}" autocomplete="off" >

                </div>
                <div class="form-group">
                  <label for="username">Số điện thoại</label>
                  <input type="text" class="form-control" id="username" name="phone_number" placeholder="Số điện thoại" value="{{$user->phone_number}}" autocomplete="off" >
                  <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Vui lòng điền chính xác số điện thoại của bạn, để chúng tôi có thể liên lạc khi có vấn đề xảy ra.
                  </div>

                </div>
                <div class="form-group">
                  <label for="username">Địa chỉ</label>
                  <input type="text" class="form-control" id="username" name="address" placeholder="Tên người dùng" value="{{$user->address}}" autocomplete="off" >

                </div>

          
       

            
      

                <div class="form-group">
                  <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Để trống trường mật khẩu nếu bạn không muốn thay đổi.
                  </div>

                </div>

                <div class="form-group">
                  <label for="password">Mật khẩu</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">

                </div>

                <div class="form-group">
                  <label for="cpassword">Nhập lại mật khẩu</label>
                  <input type="password" class="form-control" id="cpassword" name="password_confirmation" placeholder="Confirm Password" autocomplete="off">

                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary ">Lưu</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
    
    
    </section>

  </div>
  @stop
