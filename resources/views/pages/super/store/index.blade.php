@extends('layouts.super.app')
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
                        <table id="manageTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã cửa hàng</th>

                                    <th>Tên cửa hàng</th>

                                    <th>Số điện thoại
                                    </th>

                                    <th>Trạng thái
                                    </th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày kích hoạt</th>

                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($listStores as $key => $value)
                                @php
                                $textStatus = $value->status == "WAITING" ? "Đang chờ xử lý" : ($value->status ==
                                "WORKING" ? "Đang
                                hoạt động" : "Ngừng hoạt động");
                                $styleStatus = $value->status == "WAITING" ? "active-column-failure" : ($value->status
                                == "WORKING" ?
                                "active-column-success" :
                                "active-column-failure");

                                @endphp
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $value->store_code }}</td>

                                    <td>{{ $value->name }}</td>

                                    <td>{{ $value->user->phone_number }}</td>
                                    <td class="{{$styleStatus}}">{{ $textStatus }}</td>

                                    <td>{{ $value->created_at }}</td>
                                    <td>{{ $value->date_activated }}</td>
                                    <td>
                                        <button
                                        type="button" class="btn btn-primary btn-sm {{$value->status == "WORKING" ? "hide" : ""}}"   onclick="updateFunc('{{$value->id}}' ,'Xác nhận kích hoạt tài khoản' ,  '{{route('super.store.active_store', $value->id)}}')"
                                        data-toggle="modal" data-target="#updateModal"><i class="fa fa-edit"></i>Kích hoạt</button>


                                        <button
                                        type="button" class="btn btn-danger btn-sm {{$value->status == "STOP_WORKING" || $value->status == "WAITING"  ? "hide" : "AA"}}"   onclick="updateFunc('{{$value->id}}' ,'Xác nhận ngừng haot5 động tài khoản' ,  '{{route('super.store.stop_store', $value->id)}}')"
                                        data-toggle="modal" data-target="#updateModal"><i class="fa fa-trash"></i>Ngừng hoạt động</button>
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

        @include('pages.super.store.child.update_status');


        <!-- remove brand modal -->
    </section>
    <!-- /.content -->
</div>
@stop
@section('javascript')
{{-- <script src={{asset("/assets/admin/dist/js/blog.js?ver=06")}}></script> --}}

<script>

function updateFunc($id , $name , $action) {
    $('.alert-update').html(`<p>${$name}</p>`);
    $('#postUpdate').attr('action', `${$action}`);
  }
  

  
  
  
</script>
@endsection