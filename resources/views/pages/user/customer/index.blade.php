@extends('layouts.user.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý
                <small>{{$title}}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Bảng điều khiển</a></li>
                <li class="active">Quản lý {{$title}}</li>
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
                            <h3 class="box-title">Danh sách {{$title}}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="userTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên KH</th>

                                        <th>Số điện thoại</th>
                                        <th>Email
                                        </th>
                                        <th>Địa chỉ
                                        </th>
                                        <th>Chú thích
                                        </th>
                                        <th>Ngày Đăng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>



                                    @foreach ($listCustomers as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $value->full_name }}</td>
                                        <td>{{ $value->phone_number }}</td>

                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->address }}</td>

                                        <td>{{ $value->note }}</td>

                                        <td>{{ $value->created_at }}</td>
                                        <td><a type="button" class="btn btn-default" title="Chỉnh sửa"
                                                href="tel:{{$value->phone_number}}"><i
                                                    class="fa fa-phone"></i></a> 
                                           
                                                  </td>
                                                </tr>

                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- col-md-12 -->
            </div>



            <!-- remove brand modal -->
          </section>
        <!-- /.content -->
    </div>
@stop
@section('javascript')
<script src={{asset("/assets/admin/dist/js/blog.js?ver=06")}}></script>       


@endsection
