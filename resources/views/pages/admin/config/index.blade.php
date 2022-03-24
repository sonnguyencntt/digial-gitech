@extends('layouts.admin.app')
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
        @include('components.admin.popup_error')
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
          </div>

          @if($config)
          <form role="form" action="{{route("admin.config.update" , $config->id)}}" method="post" >
            @csrf
            @method('put')
            <div class="box-body">


              <div class="form-group">
                <label for="email">Chọn mẫu cửa hàng</label>
                <select name="store_sample_code" id="" class="form-control">
                  <option value="">--Chọn cửa hàng--</option>

                  @foreach($listStores as $key => $value)
                  <option value="{{$value->store_code}}" {{$value->store_code == $config->store_sample_code ? "selected"
                    : ""}}
                    >{{$value->store_code}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="email">Tài liệu hướng dẫn trỏ domain</label>
                <input type="text" class="form-control" id="title" name="document_point_domain"
                  value="{{$config->document_point_domain}}" placeholder="Nhập..." autocomplete="off" />

              </div>
              <div class="form-group">
                <label for="email">Thời gian chạy CRON kiểm tra hóa đơn</label>
                <input type="text" class="form-control" id="cron_time_for_order" name="cron_time_for_order"
                  value="{{$config->cron_time_for_order}}" placeholder="Nhập..." autocomplete="off" />

              </div>
              <div class="form-group">
                <label for="email">Tên tài khoản Momo</label>
                <input type="text" class="form-control" id="momo_user_name" name="momo_user_name"
                  value="{{$config->momo_user_name}}" placeholder="Nhập ..." autocomplete="off" />

              </div>
            <div class="form-group">
              <label for="email">Số điện thoại Momo</label>
              <input type="text" class="form-control" id="momo_phone" name="momo_phone" value="{{$config->momo_phone}}"
                placeholder="Nhập..." autocomplete="off" />

            </div>

            <div class="form-group">
              <label for="email">Tên chủ tài khoản ngân hàng</label>
              <input type="text" class="form-control" id="bank_user_name" name="bank_user_name"
                value="{{$config->bank_user_name}}" placeholder="Nhập..." autocomplete="off" />

            </div>

            <div class="form-group">
              <label for="email">Tên ngân hàng</label>
              <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{$config->bank_name}}"
                placeholder="Nhập..." autocomplete="off" />

            </div>

            <div class="form-group">
              <label for="email">STK Ngân hàng</label>
              <input type="text" class="form-control" id="bank_number" name="bank_number"
                value="{{$config->bank_number}}" placeholder="Nhập..." autocomplete="off" />

            </div>

            <div class="form-group">
              <label for="email">Nội dung khi gửi</label>
              <input type="text" class="form-control" id="note_for_payment" name="note_for_payment"
                value="{{$config->note_for_payment}}" placeholder="Nhập..." autocomplete="off" />

            </div>
        </div>






        <div class="box-footer">
          <button type="submit" class="btn btn-primary ">Lưu</button>
        </div>
        </form>

        @else
        <div class="box-body">
          <form role="form" action="{{route(" admin.config.store")}}" method="POST">
            @csrf
            <div style="display: flex ; height : 250px">
              <button type="submit" style=" margin : auto ;" class="btn btn-success btn-sm"><i
                  class="fa fa-plus"></i>Generate
                config</button>
          </form>

        </div>
      </div>

      @endif
    </div>
    <!-- /.box -->
</div>
<!-- col-md-12 -->
</div>
<!-- /.row -->


</section>

</div>
@stop
@section('javascript')
<script src={{asset("/assets/admin/dist/js/blog.js?ver=05")}}></script>

@endsection