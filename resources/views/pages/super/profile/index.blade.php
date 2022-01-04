@extends('layouts.admin.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý
                <small>Hồ sơ</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Bảng điều khiển</a></li>
                <li class="active"></li>
            </ol>
        </section>

        <!-- Main content -->



        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div id="messages">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span></button><strong> <span
                                            class="glyphicon glyphicon-ok-sign"></span> {{ $error }} </strong>
                                </div>
                            @endforeach

                        @endif
                        </div>
                        <div id="messages">
                            @if (\Session::has('flag'))
                                <div class="alert alert-{{\Session::get('flag') }} alert-dismissible show"
                                    role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span></button><strong>{{\Session::get('message')}} <span
                                            class="glyphicon glyphicon-ok-sign"></span></strong>
                                </div>

                            @endif


                        </div>
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Thông tin hồ sơ</h3>
                            </div>
                            <!-- /.box-header -->
                            <form role="form" action="{{ route('manage.profile.update') }}" method="POST"
                                onsubmit="return validate();">
                                @method('PUT')
                                <div class="box-body">
                                  <div class="form-group">
                                    <label for="fname">ID người dùng</label>
                                    <input type="text" class="form-control" id="id_tai_khoan" name="id_tai_khoan"
                                    placeholder="Username" value="{{ $user->id_tai_khoan }}" autocomplete="off" disabled>
                                </div>

                                    <input type=hidden class="form-control" id="id_tai_khoan" name="id_tai_khoan"
                                        placeholder="Username" value="{{ $user->id_tai_khoan }}" autocomplete="off">
                                    <div class="form-group">
                                        <label for="fname">Họ và tên</label>
                                        <input type="text" class="form-control" id="ho_va_ten" name="ho_va_ten"
                                            placeholder="Họ và tên" value="{{ $user->ho_va_ten }}" autocomplete="off">
                                        <p id="err_ho_va_ten" class="hide-elm text-danger">Họ và tên không được để trống</p>

                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                            value="{{ $user->email }}" autocomplete="off">
                                        <p id="err_email" class="hide-elm text-danger">Email và tên không được để trống.</p>

                                    </div>





                                    <div class="form-group">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" class="form-control" id="sdt" name="sdt"
                                            placeholder="Số điện thoại" value="{{ $user->sdt }}" autocomplete="off">
                                        <p id="err_sdt" class="hide-elm text-danger">Số điện thoại</p>

                                    </div>


                                    <div class="form-group">
                                        <div class="alert alert-info alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            Để trống trường mật khẩu nếu bạn không muốn thay đổi.
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="password">Mật khẩu</label>
                                        <input type="password" class="form-control" id="setting_password"
                                            name="setting_password" placeholder="Mật khẩu" autocomplete="off">
                                        <p id="err_setting_password" class="hide-elm text-danger">Mật khẩu không được để
                                            trống.</p>

                                    </div>

                                    <div class="form-group">
                                        <label for="cpassword">Nhập lại mật khẩu</label>
                                        <input type="password" class="form-control" id="setting_cpassword"
                                            name="setting_cpassword" placeholder="Nhập lại mật khảu" autocomplete="off">
                                        <p id="err_setting_cpassword" class="hide-elm text-danger">Mật khẩu không được để
                                            trống.</p>

                                    </div>

                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary ">Lưu thay đổi</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
                    </div>

                </div>
                <!-- /.row -->


        </section>

        <!-- /.content -->
    </div>
@stop
@section('javascript')
    <script src={{ asset('assets/admin/dist/js/profile.js?ver=02') }}></script>
@stop
