@extends('layouts.admin.app')
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
                  @include('components.admin.popup_error')

            


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Danh sách {{$title}}</h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="manageTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên KH</th>

                                        <th>Số điện thoại</th>
                                        <th>Email
                                        </th>
                                        <th>Địa chỉ
                                        </th>
                                        <th>Danh mục
                                        </th>
                                        <th>Sản phẩm
                                        </th>
                                        <th>Ngày Đăng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>



                                    @foreach ($listOrders as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->phone_number }}</td>

                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->address }}</td>

                                        <td>{{ $value->internet->category == null ? null : $value->internet->category->name }}</td>
                                        <td>{{ $value->internet->name }}</td>


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
            @include('pages.admin.banner.child.remove_popup');
          </section>
        <!-- /.content -->
    </div>
@stop
@section('javascript')
<script src={{asset("/assets/admin/dist/js/blog.js?ver=06")}}></script>       


@endsection
