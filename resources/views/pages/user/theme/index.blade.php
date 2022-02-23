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
            <h3 class="box-title">{{$title}}</h3>
          </div>
         
              @if($theme)
              <form role="form" action="{{route("user.theme.update" , ["store_code"=>$badges->store_code , "theme" =>
                $theme->id])}}" method="post" enctype="multipart/form-data" >
                @csrf
                @method('put')
                <div class="box-body">
              <div class="row">
                <div class="col-md-6 col-xs-6">
                  <div class="form-group">
                    <label>Image Preview: </label>
                    <img src="{{asset($theme->logo)}}" width="150" height="150" class="img-circle">
                    <input type="hidden" value="{{$theme->logo}}" name="image_url_string" />
                  </div>

                  <div class="form-group">

                    <label for="product_image">Ảnh</label>
                    <div class="kv-avatar">
                      <div class="file-loading">
                        <input id="image" name="logo" type="file">

                      </div>
                    </div>

                  </div>

                  <div class="form-group">
                    <label for="email">Địa chỉ</label>
                    <input type="text" class="form-control" id="email" name="address" placeholder="Nhâp..."
                      value="{{$theme->address}}" autocomplete="off">

                  </div>
                  <div class="form-group">
                    <label for="email">Hotline</label>
                    <input type="text" class="form-control" id="email" name="hotline" placeholder="Nhâp..."
                      value="{{$theme->hotline}}" autocomplete="off">

                  </div>
                  <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Nhâp..."
                      value="{{$theme->email}}" autocomplete="off">

                  </div>
                  <div class="form-group">
                    <label for="email">ID Zalo</label>
                    <input type="text" class="form-control" id="email" name="id_zalo" placeholder="Nhâp..."
                      value="{{$theme->id_zalo}}" autocomplete="off">

                  </div>
                  <div class="form-group">
                    <label for="email">ID Facebook</label>
                    <input type="text" class="form-control" id="email" name="id_facebook" placeholder="Nhâp..."
                      value="{{$theme->id_facebook}}" autocomplete="off">

                  </div>
                </div>

                <div class="col-md-6 col-xs-6">

                  <div class="form-group">
                    <label for="email">ID Youtube</label>
                    <input type="text" class="form-control" id="email" name="id_youtube" placeholder="Nhâp..."
                      value="{{$theme->id_youtube}}" autocomplete="off">

                  </div>
                  <div class="form-group">
                    <label for="email">Tên miền trỏ đến</label>
                    <input type="text" class="form-control" id="email" name="domain" placeholder="VD:tenmiencuatoi.com"
                      value="{{$theme->domain}}" autocomplete="off">
                    <i><a href="{{$badges->document_point_domain}}">Hướng dẫn trỏ tên miền</a></i>
                  </div>
                  <div class="form-group">
                    <label for="email">Nhúng bản đồ vị trí</label>
                    <input type="text" class="form-control" id="email" name="iframe_position" placeholder="Nhập..."
                      value="{{$theme->iframe_position}}" autocomplete="off">

                  </div>

                  <div class="form-group">
                    <label for="email">Chính sách bảo mật</label>
                    <select name="post_id_privacy_policy" id="" class="form-control">
                      <option value=""></option>

                      @foreach($listPosts as $key => $value)
                      <option value="{{$value->id}}" {{$value->id == $theme->post_id_privacy_policy ? "selected" : ""}}
                        >{{$value->title}}</option>
                      @endforeach

                    </select>

                  </div>
                  <div class="form-group">
                    <label for="email">Chính sách thanh toán</label>
                    <select name="post_id_payment_policy" id="" class="form-control">
                      <option value=""></option>
                      @foreach($listPosts as $key => $value)
                      <option value="{{$value->id}}" {{$value->id == $theme->post_id_payment_policy ? "selected" : ""}}
                        >{{$value->title}}</option>
                      @endforeach

                    </select>


                  </div>
                  <div class="form-group">
                    <label for="email">Điều khoản sử dụng Website</label>
                    <select name="post_id_website_terms_of_use" id="" class="form-control">
                      <option value=""></option>

                      @foreach($listPosts as $key => $value)
                      <option value="{{$value->id}}" {{$value->id == $theme->post_id_website_terms_of_use ? "selected" :
                        ""}}
                        >{{$value->title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                {{-- thêm icon zalo fb và youtube --}}
                
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary ">Lưu</button>
            </div>
          </form>
              @else
              <div class="box-body">
                <form role="form" action="{{route("user.theme.store" ,$badges->store_code )}}" method="post" >
              <div style="display: flex ; height : 250px" >
                <button type="submit" style="; margin : auto ;"  type="button" class="btn btn-success btn-sm"
                ><i class="fa fa-plus"></i>Generate Theme</button>
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