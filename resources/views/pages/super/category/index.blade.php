@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý
        <small>Danh mục</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Bảng điều khiển</a></li>
        <li class="active">Quản lý danh mục</li>
      </ol>
    </section>

    <!-- Main content -->



    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div id="messages">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button><strong> <span
                                class="glyphicon glyphicon-ok-sign"></span> {{ $error }} </strong>
                    </div>
                @endforeach

            @endif
            </div>
            <div id="messages">
                @if (\Session::has('flag'))
                    <div class="alert alert-{{\Session::get('flag')}} alert-dismissible show"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button><strong>{{\Session::get('message')}} <span
                                class="glyphicon glyphicon-ok-sign"></span></strong>
                    </div>

                @endif


            </div>
          <button class="btn btn-primary " data-toggle="modal" data-target="#addModal">Thêm danh mục</button>
          <br /> <br />


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách danh mục</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="manageTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>ID danh mục</th>

                    <th>Tên danh mục</th>
                    <th>Hành động</th>
                   

                  </tr>
                </thead>
                <tbody>
                 
            
                  @foreach ($list_category as $key => $value)
                  <tr>
                      <td></td>
                      <td>{{ $value->id_danh_muc }}</td>
                   
                      <td>{{ $value->ten_danh_muc }}</td>
                     

                      <td> 
                        <a type="button" class="btn btn-default"  title="Chỉnh sửa"  data-toggle="modal" data-target="#editModal"
                            onclick="editFunc('{{$value->id_danh_muc}}')"><i
                                  class="fa fa-edit"></i></a>
                            <a type="button" class="btn btn-default"  title="Xóa"  data-toggle="modal" data-target="#removeModal"
                            onclick="removeFunc('{{$value->id_danh_muc}}')"><i
                                  class="fa fa-trash"></i></a>
                               
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

      <div class="modal fade" tabindex="-1" role="dialog" id="addModal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Thêm danh mục</h4>
              <div class="progress hide-elm" id="progress" style="margin-bottom: 0px !important;">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40"
                  aria-valuemin="0" aria-valuemax="100" style="width:0%">
                  0%
                </div>
              </div>
            </div>

            <form role="form" action="{{route("manage.category.store")}}" onsubmit="return validate();" method="post" id="createForm">

              <div class="modal-body">

                  <div class="form-group">
                      <label for="brand_name">ID danh mục</label>
                      <input type="text" class="form-control" id="iddanhmuc" name="iddanhmuc"
                        placeholder="Id tự động" autocomplete="off" disabled>
                      <p id="err_iddanhmuc" class="hide-elm text-danger"></p>
                    </div>
                <div class="form-group">
                  <label for="brand_name">Tên danh mục</label>
                  <input type="text" class="form-control" id="tendanhmuc" name="tendanhmuc"
                    placeholder="Nhập tên danh mục" autocomplete="off">
                  <p id="err_tendanhmuc" class="hide-elm text-danger">Tên danh mục không được để trống</p>
                </div>
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
              </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <!-- edit brand modal -->
      <div class="modal fade" tabindex="-1" role="dialog" id="editModal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Chỉnh sửa danh mục</h4>
              <div class="progress hide-elm" id="progress-edit" style="margin-bottom: 0px !important;">
                <div class="progress-bar progress-bar-striped active" id="progress-bar-edit" role="progressbar"
                  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                  0%
                </div>
              </div>
            </div>
            <form role="form" action="stores/update" method="post" id="updateForm">
              <div class="modal-body">
                <ul class="o-vertical-spacing o-vertical-spacing--l">
                  <li class="blog-post o-media">
                    
                    <div class="o-media__body">
                      <div class="o-vertical-spacing">
                        <h3 class="blog-post__headline">
                          <span class="skeleton-box" style="width:55%;"></span>
                        </h3>
                        <p>
                          <span class="skeleton-box" style="width:80%;"></span>
                          <span class="skeleton-box" style="width:90%;"></span>
                          <span class="skeleton-box" style="width:83%;"></span>
                          <span class="skeleton-box" style="width:80%;"></span>
                        </p>
                        <div class="blog-post__meta">
                          <span class="skeleton-box" style="width:70px;"></span>
                        </div>
                      </div>
                    </div>
                  </li>
              
                 
                </ul>
              </main>

             <div class="main-contend hide" >
              <div class="form-group">
                <label for="brand_name">ID danh mục</label>
                <input type="text" class="form-control" id="iddanhmuc" name="iddanhmuc"
                  placeholder="Id auto complement" autocomplete="off" disabled>
                <p id="err_iddanhmuc" class="hide-elm text-danger"></p>
              </div>
          <div class="form-group">
            <label for="brand_name">Tên danh mục</label>
            <input type="text" class="form-control" id="tendanhmuc" name="tendanhmuc" 
              placeholder="Enter category name" autocomplete="off">
            <p id="err_tendanhmuc" class="hide-elm text-danger">Tên danh mục không được để trống</p>
          </div>
             </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="submit" id="submit-edit" class="btn btn-primary">Lưu thay đổi</button>
              </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <!-- remove brand modal -->
      <div class="modal fade" tabindex="-1" role="dialog" id="removeModal" data-keyboard="false"
        data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Xóa danh mục</h4>
              <div class="progress hide-elm" id="progress-remove" style="margin-bottom: 0px !important;">
                <div class="progress-bar progress-bar-striped active" id="progress-bar-remove" role="progressbar"
                  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                  0%
                </div>
              </div>
            </div>
            <form role="form" action="#" method="post" id="remove">
              @method('delete')
              <div class="modal-body">
                <input type="hidden" name="danhmuc">

                <div class="alert-remove">
                </div> 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary remove_category">Xóa</button>
              </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </section>
    <!-- /.content -->
  </div>
  @stop
  @section('javascript')
  <script src={{asset("/assets/admin/dist/js/category.js?ver=05")}}></script>       

  @endsection
  @section('css')
    <style>
      @media (min-width: 768px) {
  .modal-xl {
    width: 90% !important;
   max-width:1200px !important;
  }
}
        .skeleton-box {
  display: inline-block;
  height: 1em;
  position: relative;
  overflow: hidden;
  background-color: #DDDBDD;
  -webkit-animation-duration: 1s;
  -webkit-animation-fill-mode: forwards;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-name: placeHolderShimmer;
  -webkit-animation-timing-function: linear;
  background: #f6f7f8;
  background-image: -webkit-gradient(linear, left center, right center, from(#f6f7f8), color-stop(.2, #edeef1), color-stop(.4, #f6f7f8), to(#f6f7f8));
  background-image: -webkit-linear-gradient(left, #f6f7f8 0%, #edeef1 20%, #f6f7f8 40%, #f6f7f8 100%);
  background-repeat: no-repeat;
  border-radius: 2px;
        }
  &::after {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    transform: translateX(-100%);
    background-image: linear-gradient(
      90deg,
      rgba(#fff, 0) 0,
      rgba(#fff, 0.2) 20%,
      rgba(#fff, 0.5) 60%,
      rgba(#fff, 0)
    );
    animation: shimmer 2s infinite;
    content: '';
  }

  @keyframes shimmer {
    100% {
      transform: translateX(100%);
    }
  }
}

.blog-post {
  &__headline {
    font-size: 1.25em;
    font-weight: bold;
  }

  &__meta {
    font-size: 0.85em;
    color: #6b6b6b;
  }
}

// OBJECTS

.o-media {
  display: flex;
  
  &__body {
    flex-grow: 1;
    margin-left: 1em;
  }
}

.o-vertical-spacing {
  > * + * {
    margin-top: 0.75em;
  }
  
  &--l {
    > * + * {
      margin-top: 2em;
    }
  }
}

// MISC

* {
  box-sizing: border-box;
}




main {
  margin-top: 3em;
}



  main > p {
    &:not(:first-child) {
      margin-top: 1em;
    }
  }
}
    </style>
@endsection