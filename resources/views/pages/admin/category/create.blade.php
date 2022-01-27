@extends('layouts.admin.app')
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
            <form role="form" id = "postForm" action="{{route("admin.category.store")}}"  method="post" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
              
    
       
       
              
                <div class="form-group">
                  <label for="product_name" >Tiêu đề</label>
                  <input type="text" class="form-control" id="title" name="name" value = "{{old("name")}}" placeholder="Nhập tiêu đề" autocomplete="off" />
                  <p id="err_title" class="hide-elm text-danger">Tiêu đề không được để trống</p>
    
                </div>
                <div class="form-group">
                  <label for="product_name" >Link Route</label>
                  <input type="text" class="form-control" id="title" name="link_url" value = "{{old("link_url")}}" placeholder="Nhập tiêu đề" autocomplete="off" />
                  <p id="err_title" class="hide-elm text-danger">Tiêu đề không được để trống</p>
    
                </div>
            
                <div class="form-group">
                  <label for="status" >Cửa hàng</label>
                  <select name="store_code" id=""   class="form-control">
                 
                    @foreach($listStores as $key => $value)
                      <option value="{{$value->store_code}}" {{$value->store_code == old("store_code") ? "selected" : ""}} >{{$value->name}}</option>
                    @endforeach

                  </select>
    
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