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
            <form role="form" id = "postForm" action="{{route("user.category.store" , $badges->store_code)}}"  method="post" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
              
                {{-- <div class="form-group">
    
                  <label for="product_image">Ảnh</label>
                  <div class="kv-avatar">
                    <div class="file-loading">
                      <input id="image" name="image" type="file" >
    
                    </div>
                  </div>
    
                </div>
     --}}
       
       
              
                <div class="form-group">
                  <label for="product_name" >Tiêu đề</label>
                  <input type="text" class="form-control" id="title" name="name" value = "{{old("name")}}" placeholder="Nhập tiêu đề" autocomplete="off" />
                  <p id="err_title" class="hide-elm text-danger">Tiêu đề không được để trống</p>
    
                </div>
                <div class="form-group">
                  <label for="product_name" >Thứ tự hiển thị</label>
                  <input type="text" class="form-control" id="sort_number" name="sort_number" value = "{{old("sort_number")}}" placeholder="Nhập số" autocomplete="off" />
                  <p id="err_title" class="hide-elm text-danger">Tiêu đề không được để trống</p>
    
                </div>
                <div class="form-group">
                  <label for="product_name" >Link Route</label>
                  <input type="text" class="form-control" id="title" name="link_url" value = "{{old("link_url")}}" placeholder="Nhập tiêu đề" autocomplete="off" />
                  <p id="err_title" class="hide-elm text-danger">Tiêu đề không được để trống</p>
    
                </div>
            
                <div class="form-group">
                  <label for="description">Thông tin chi tiết</label>
                 
                  <textarea id="details"  name = "details">{{old("details")}}</textarea>

                </div>
                <div class="form-group">
                  <label for="description">Ưu điểm</label>
                 
                  <textarea id="advantage"  name = "advantage">{{old("advantage")}}</textarea>

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
  <script src={{asset("/assets/admin/dist/js/blog.js?ver=02")}}></script>

  <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">
  
  <script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/suneditor@latest/src/lang/ko.js"></script>
  
  <script src={{asset("/assets/admin/ckeditor.js?ver=4")}}></script>      

  <script> load_ckeditor("details") 
  load_ckeditor("advantage") 
  </script>  
  @endsection