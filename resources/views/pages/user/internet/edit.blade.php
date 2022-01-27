@extends('layouts.user.app')
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
            <form role="form" id = "postForm" action="{{route("user.service_internet.update" , ["store_code" => $store_code , "internet"=>$internet->id])}}" method="POST"   enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="box-body">
              
    
  
              
                <div class="form-group">
                  <label for="product_name" >Tên gói</label>
                  <input type="text" class="form-control" id="name" name="name" value = "{{$internet->name}}" placeholder="Nhập tên" autocomplete="off" />
    
                </div>
                <div class="form-group">
                  <label for="product_name" >Giá</label>
                  <input type="text" class="form-control" id="name" name="price" value = "{{$internet->price}}" placeholder="Nhập giá" autocomplete="off" />
    
                </div>
                <div class="form-group">
                  <label for="product_name" >Kích cỡ</label>
                  <input type="text" class="form-control" id="name" name="size" value = "{{$internet->size}}" placeholder="Nhập kích cỡ" autocomplete="off" />
    
                </div>
                <div class="form-group">
                  <label for="status" >Danh mục</label>
                  <select name="category_id" id=""   class="form-control">
                 
                    @foreach($listCategories as $key => $value)
                      <option value="{{$value->id}}" {{$value->id == $internet->category_id ? "selected" : ""}} >{{$value->name}}</option>
                    @endforeach

                  </select>
    
                </div>
                <div class="form-group">
                  <label for="description">Nội dung </label>
                 
                  <textarea id="description"  name = "description">{{$internet->description}}</textarea>

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