@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chỉnh sửa
        <small>Bài viết</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Bảng điều khiển</a></li>
        <li class="active">Chỉnh sửa bài viết</li>
      </ol>
    </section>

    <!-- Main content -->



    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
    
          
    
    
    
    
          <div class="box">
            <div class="box-header">
            </div>
            <form role="form" action="{{route("manage.blog.update" , blog->id_bai_viet)}}" method="POST" onsubmit="return validate_update();"  enctype="multipart/form-data">
              @method('PUT')  
              <div class="box-body">
                <div class="form-group">
                  <label>Image Preview: </label>
                  <img src="{{asset("blog->hinh_anh")}}" width="150" height="150" class="img-circle">
                </div>
    
                <div class="form-group">
      
                  <label for="product_image">Ảnh</label>
                  <div class="kv-avatar">
                    <div class="file-loading">
                      <input id="hinhanh" name="hinhanh" type="file" >
    
                    </div>
                  </div>
    
                </div>
                  
                <div class="form-group">
                  <label for="product_name" >ID bài viết</label>
                  <input type="text" class="form-control" id="idbaiviet" value="{{blog->id_bai_viet}}"  name="idbaiviet" placeholder="Tự động" autocomplete="off"  disabled />
    
                </div>

                  <div class="form-group">
                    <label for="product_name" >Ngày đăng</label>
                    <input type="text" class="form-control" id="ngaydang" value="{{blog->ngay_dang}}"  name="ngaydang" placeholder="Tự động" autocomplete="off"  disabled />
      
                  </div>
    
                
                  <div class="form-group">
                    <label for="product_name" >Tiêu đề</label>
                    <input type="text" class="form-control" id="tieude" value="{{blog->tieu_de}}" name="tieude" placeholder="Nhập tiêu đề" autocomplete="off" />
                    <p id="err_tieude" class="hide-elm text-danger">Tiêu đề không được để trống</p>
      
                  </div>
                  
                  <div class="form-group">
                      <label for="category">Danh mục</label>
                      <select class="form-control " id="iddanhmuc"  name="iddanhmuc">
                        <option value="" selected >--- Chọn danh mục ---</option>
  
                       @if (\count(category) > 0)
                        @foreach(category as key => value)
                        <option value="{{value->id_danh_muc}}" 

                          @if((string)value->id_danh_muc === (string)blog->id_danh_muc)
                            selected
                          @endif
                          
                          >{{value->ten_danh_muc}}</option>
                        @endforeach
    
                        @else
                        <option value=""  >--- Không có danh mục nào ---</option>
  
                        @endif 
                      </select>
                      <p id="err_iddanhmuc" class="hide-elm text-danger">Danh mục không được để trống</p>
        
                    </div>
  
                    <div class="form-group">
                      <label for="category">Nội dung</label>
                      <textarea name="noidung" class="form-control"  id="noidung">{{blog->noi_dung}}</textarea>
                      <p id="err_noidung" class="hide-elm text-danger">Nội dung không được để trống</p>
        
                    </div>
                
                   
      
                </div>
              <!-- /.box-body -->
    
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                <a href="manage_song.php" class="btn btn-warning">Trở về</a>
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
  <script src={{asset("/assets/admin/dist/js/blog.js?ver=01")}}></script>       

  <script src={{ asset('assets/admin/ckeditor/ckeditor.js?ver=02') }}></script>
  <script src={{ asset('assets/admin/ckfinder/ckfinder.js') }}></script>

  <script> CKEDITOR.replace('noidung'); </script>  
  @endsection