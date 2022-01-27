@extends('layouts.user.app')
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


        @include('components.user.popup_error')




        <div class="box">
          <div class="box-header">
          </div>
          <form role="form" action="{{route("user.category.update" , ["store_code"=>$badges->store_code , "category" =>
            $category->id])}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            <div class="box-body">

              <div class="form-group">
                <label>Image Preview: </label>
                <img src="{{asset($category->image_url)}}" width="150" height="150" class="img-circle">
                <input type="hidden" value="{{$category->image_url}}" name="image_url_string" />
              </div>

              <div class="form-group">

                <label for="product_image">Ảnh</label>
                <div class="kv-avatar">
                  <div class="file-loading">
                    <input id="image" name="image" type="file">

                  </div>
                </div>

              </div>


              <div class="form-group">
                <label for="product_name">Tiêu đề</label>
                <input type="text" class="form-control" id="title" value="{{$category->name}}" name="name"
                  placeholder="Nhập tiêu đề" autocomplete="off" />
                <p id="err_title" class="hide-elm text-danger">Tiêu đề không được để trống</p>

              </div>

              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
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

<script src={{asset("/assets/admin/ckeditor.js?ver=2")}}></script>

<script>
  load_ckeditor("description") 
</script>
@endsection