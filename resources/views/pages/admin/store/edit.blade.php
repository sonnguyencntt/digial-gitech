@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CHỈNH SỬA
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
            </div>
            <form role="form" id = "postForm" action="{{route("admin.store.update" , $store->id)}}" method="POST"   enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="box-body">
              
    
  
              
                <div class="form-group">
                  <label for="product_name" >Trạng thái shop</label>
                  <select name="status" id=""   class="form-control">

                    <option value="WORKING" {{$store->status == "WORKING"? "selected" : ""}} >Hoạt động</option>
                    <option value="STOP_WORKING" {{$store->status == "STOP_WORKING" ? "selected" : ""}} >Dừng hoạt động</option>


                  </select>
                </div>
                <div class="form-group">
                  <label for="product_name" >Ngày kích hoạt</label>
                  <input type="date" class="form-control" id="title" name="date_activated" value = "{{date('Y-m-d', strtotime($store->date_activated))}}" placeholder="Nhập tiêu đề" autocomplete="off" />
                </div>
                <div class="form-group">
                  <label for="product_name" >Hóa đơn</label>
                  <select name="order_id" id=""   class="form-control">

                  @foreach($paymentHistories as $key => $payment)
                  <option value="{{$payment->id}}" {{$store->order_id == $payment->id? "selected" : ""}} >{{$payment->order_code}}</option>
                @endforeach
                </select>
                </div>
         
             
             
              <!-- /.box-body -->
    
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="{{ url()->previous() }}" class="btn btn-warning">Trở về</a>
              </div>
            </form>
            <!-- /.box-body -->
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
  <script src={{asset("/assets/admin/dist/js/blog.js?ver=04")}}></script>       

  <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/suneditor@latest/src/lang/ko.js"></script>

<script src={{asset("/assets/admin/ckeditor.js?ver=2")}}></script>       

  <script> load_ckeditor("description") </script>  
  @endsection