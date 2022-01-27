@extends('layouts.user.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý
                <small>bài viết</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Bảng điều khiển</a></li>
                <li class="active">Quản lý bài viết</li>
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
                    <a class="btn btn-primary" href="{{ route('manage.posts.create') }}">Thêm mới bài viết</a>

                    <br /> <br />


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Danh sách bài viết</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="manageTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>ID Bài Viết</th>

                                        <th>Hình Ảnh</th>
                                        <th>Ngày Đăng</th>
                                        <th>Tiêu Đề</th>
                                        <th>ID danh mục</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>



                                    @foreach ($blogs as $key => $value)
                                    <tr>
                                        <td></td>
                                        <td>{{ $value->id_bai_viet }}</td>
                                        <td><img src={{asset("$value->hinh_anh")}} style="    width: 150px;
                                          height: 100px;" loading="lazy"></td>
                                        <td>{{ $value->ngay_dang }}</td>
                                        <td>{{ $value->tieu_de }}</td>
                                        <td>{{ $value->id_danh_muc }}</td>
                                        <td><a type="button" class="btn btn-default" title="Chỉnh sửa"
                                                href="{{ route('manage.blog.edit', $value->id_bai_viet) }}"><i
                                                    class="fa fa-pencil"></i></a> 
                                              <a type="button" class="btn btn-default"  title="Xóa"  data-toggle="modal" data-target="#removeModal"
                                              onclick="removeFunc('{{$value->id_bai_viet}}')"><i
                                                    class="fa fa-trash"></i></a>
                                                    <button
                                                    type="button" class="btn btn-default" onclick="showBlog('{{$value->id_bai_viet}}')"  title="Xem bài viết"
                                                    data-toggle="modal" data-target="#editModal"><i class="fa fa-eye"></i></button>
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


 <div class="modal fade" tabindex="-1" role="dialog" id="editModal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span></button>
              <h4 class="modal-title title-blog">ID Bài viết : <b>#BL992138128</b></h4>
              <div class="progress hide-elm" id="progress-edit" style="margin-bottom: 0px !important;">
                <div class="progress-bar progress-bar-striped active" id="progress-bar-edit" role="progressbar"
                  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                  0%
                </div>
              </div>
            </div>
          
              <div class="modal-body content-blog">
               

<main class="load-lazy-loading">
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
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
              </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>
            <!-- remove brand modal -->
            <div class="modal fade" tabindex="-1" role="dialog" id="removeModal" data-keyboard="false"
                data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Xóa bài viết</h4>
                            <div class="progress hide-elm" id="progress-remove" style="margin-bottom: 0px !important;">
                                <div class="progress-bar progress-bar-striped active" id="progress-bar-remove"
                                    role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                    style="width:0%">
                                    0%
                                </div>
                            </div>
                        </div>
                        <form role="form"   method="post" id="remove">
                          @method('delete')
                            <div class="modal-body">
                                <input type="hidden" id="baiviet" name="baiviet">

                                 <div class="alert-remove">
                    </div> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary remove_blog">Xóa</button>
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
<script src={{asset("/assets/admin/dist/js/blog.js?ver=04")}}></script>       


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