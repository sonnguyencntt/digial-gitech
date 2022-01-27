@extends('layouts.user.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        THÊM MỚI
        <small>{{$title}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Bảng điều khiển</a></li>
        <li class="active">Thêm mới {{$title}}</li>
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
            <form role="form" id = "postForm" action="{{route("user.store.store")}}"  method="post" >
              @csrf
              <div class="box-body">
              
  
                
                <div class="form-group">
                  <label for="product_name" >Mã cửa hàng</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="store_code" placeholder="Tên miển truy cập" value="{{old("store_code")}}">
                    <span class="input-group-addon">.{{$domain_name}}</span>
                    </div>    
                </div>
                <div class="form-group">
                  <label for="product_name" >Tên cửa hàng</label>
                    <input type="text" name="name" class="form-control" placeholder="Tên cửa hàng" value="{{old("name")}}">
                </div>
                <div class="form-group">
                  <label for="product_name" >Địa chỉ</label>
                    <input type="text" name="address" class="form-control" placeholder="Địa chỉ" value="{{old("address")}}">
                </div>
  
  
  
              
            
            
              
             
              <!-- /.box-body -->
    
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Thêm dữ liệu</button>
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