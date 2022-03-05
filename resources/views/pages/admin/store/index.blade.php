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
                                    <th>Gói cho thuê</th>
                                    <th>Số tiền</th>


                                    <th>Trạng thái
                                    </th>
                                    <th>Mã hóa đơn
                                    </th>
                                    <th>Trạng thái thanh toán</th>

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


                                $textStatusPayment = null;
                                $styleStatusPayment = null;

                                if($value->payment_history)
                                {
                                $textStatusPayment = $value->payment_history->payment_status == "1" ? "Đã thanh toán"
                                : "Chưa thanh toán";
                                $styleStatusPayment = $value->payment_history->payment_status == "1" ?
                                "active-column-success" : "active-column-failure";
                                }
                                @endphp
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $value->store_code }}</td>

                                    <td>{{ $value->name }}</td>

                                    <td>{{ $value->user->phone_number }}</td>
                                    <td>{{ $value->rent_shop->price ?? 0 }}</td>

                                    <td>
                                        <select name="rent_shop" id=""
                                            onchange="changeRentShop(this , '{{$value->id}}');" class="form-control">
                                            <option value="">-- Cập nhật giá --</option>
                                            @foreach($listRentShops as $key => $_value)
                                            <option value="{{$_value->id}}" {{$_value->id == $value->rent_shop_id ?
                                                "selected" : ""}} >{{$_value->name}}</option>
                                            @endforeach

                                        </select>
                                    </td>

                                    <td class="{{$styleStatus}}">{{ $textStatus }}</td>
                                    <td >{{ $value->payment_history->order_code ?? null }}</td>

                                    <td class="{{$styleStatusPayment}}">{{ $textStatusPayment }}</td>


                   
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm {{$value->status == "
                                            WAITING" ? "" : "hide" }}"
                                            onclick="updateFunc('{{$value->id}}' ,'Xác nhận kích hoạt tài khoản' ,  '{{route('admin.store.active_store', $value->id)}}')"
                                            data-toggle="modal" data-target="#updateModal">Kích hoạt Shop</button>

                                        @if($textStatusPayment)
                                        @if($value->payment_history->payment_status !== "PAID")
                                        <button type="button" class="btn btn-primary btn-sm"
                                            onclick="updateFunc('{{$value->order_id}}' ,'Thanh toán cửa hàng' ,  '{{route('admin.store.paid_accept', $value->order_id)}}')"
                                            data-toggle="modal" data-target="#updateModal">Thanh toán</button>
                                        @endif
                                        @endif
                                   

                                        <button type="button" class="btn btn-danger btn-sm {{$value->status == "
                                            WORKING" ? "" : "hide" }}"
                                            onclick="updateFunc('{{$value->id}}' ,'Xác nhận ngừng hoạt động tài khoản' ,  '{{route('admin.store.stop_store', $value->id)}}')"
                                            data-toggle="modal" data-target="#updateModal">Ngừng hoạt động</button>


                                        <button type="button" class="btn btn-success btn-sm {{$value->status == "
                                            STOP_WORKING" ? "" : "hide" }}"
                                            onclick="updateFunc('{{$value->id}}' ,'Xác nhận  hoạt động tài khoản' ,  '{{route('admin.store.active_for_paid', $value->id)}}')"
                                            data-toggle="modal" data-target="#updateModal">Hoạt động</button>


                                        <a type="button" class="btn btn-default" title="Xóa" data-toggle="modal"
                                            data-target="#removeModal"
                                            onclick="removeFunc('{{$value->id}}' , '{{$value->name}}')"><i
                                                class="fa fa-trash"></i></a>


                                                <a type="button" class="btn btn-default" title="Chỉnh sửa"
                                                href="{{ route('admin.store.edit',$value->store_code) }}"><i
                                                    class="fa fa-pencil"></i></a> 
                                    </td>

                                </tr>

                                @endforeach



                            </tbody>
                        </table>
                    </div>
                    <form action="" id="formChangeRentShop" method="post">
                        @csrf
                        @method('put')
                        <input name="rent_shop_id" type="hidden">

                    </form>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- col-md-12 -->
        </div>

        @include('pages.admin.store.child.update_status');
        @include('pages.admin.store.child.remove_popup');


        <!-- remove brand modal -->
    </section>
    <!-- /.content -->
</div>
@stop
@section('javascript')
<script src={{asset("/assets/admin/dist/js/blog.js?ver=06")}}></script>

<script>
    function changeRentShop($this , $store_id) {
    $("[name=rent_shop_id]").val($this.value);
    $('#formChangeRentShop').attr('action', `/store/change-rent-shop/${$store_id}`);
    $("#formChangeRentShop").submit();
  }
  

function updateFunc($id , $name , $action) {
    $('.alert-update').html(`<p>${$name}</p>`);
    $('#postUpdate').attr('action', `${$action}`);
  }
  

  
  
  
</script>
@endsection