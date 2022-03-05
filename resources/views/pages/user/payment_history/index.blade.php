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


                    @if($badges->admin_configs)
                    @php
                        $config = $badges->admin_configs;
                    @endphp
                    <div class="info-payment">
                        <p>Khách hàng có thể thực hiện thanh toán qua</p>
                        @php
                            
                        @endphp
                        <div class="" style="display: flex">
                            <div class="col-md-5">
                                <p>-Tài khoản ngân hàng</p>

                                <p><span>+Ngân hàng : {{$config->bank_name}}</span> </p>
                                <p><span>+Tên chủ tài khoản : {{$config->bank_user_name}}</span> </p>
                                <p><span>+Số tài khoản : {{$config->bank_number}}</span> </p>
                            </div>
                            <div class="col-md-5" >
                                <p>-Momo</p>
                                <p><span>+Tên người dùng : {{$config->momo_user_name}}</span> </p>
                                <p><span>+Số điện thoại : {{$config->momo_phone}}</span> </p>
                            </div>
                        </div>
                
                        <p>***Lưu ý : Khi gửi quý khách vui lòng ghi nội dung theo cú pháp sau : {{$config->note_for_payment}}</p>



                    </div>
                    @endif
                 

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
                                        <th>Mã đơn hàng</th>

                                        <th>Ngày đã đóng</th>
                                        <th>Thời hạn sử dụng</th>
                                        <th>Số tiền đã đóng</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>



                                    @foreach ($listPaymentHistories as $key => $value)
                                    @php
                                    $text_status = $value->payment_status ? "Đã thanh toán" : "Chưa thanh toán";
                                    $style_status = $value->payment_status ? "success" : "danger";
                                @endphp
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $value->order_code }}</td>

                                        <td>{{ $value->date_paid }}</td>
                                        <td>{{ $value->date_expired }}</td>
                                        <td>{{ $value->paid_amount }}</td>
                                        <td>
                                            <span class="badge badge-{{$style_status}}">{{$text_status}}</span>
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

            @include('pages.user.payment_history.child.remove_popup');


            <!-- remove brand modal -->
          </section>
        <!-- /.content -->
    </div>
@stop
@section('javascript')
<script src={{asset("/assets/admin/dist/js/blog.js?ver=06")}}></script>       


@endsection
