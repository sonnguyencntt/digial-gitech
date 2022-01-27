@extends('layouts.user.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý
                <small>{{$title}}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Bảng điều khiển</a></li>
                <li class="active">Quản lý {{$title}}</li>
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
                            <h3 class="box-title">Danh sách {{$title}}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="userTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên</th>
                                        <th>Giá</th>
                                        <th>Giảm giá</th>
                                        <th>Danh mục</th>
                                        <th>Màu sắc</th>
                                        <th>Lưu trữ</th>
                                        <th>Chuẩn kết nối</th>
                                        <th>Bảo hành
                                        </th>

                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>



                                    @foreach ($listCameras as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><img src={{asset("$value->image_url")}} style="    width: 150px;
                                            height: 100px;" loading="lazy"></td>                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->price }}</td>
                                        <td>{{ $value->discount }}</td>
                                        <td>{{ $value->category == null ? null : $value->category->name }}</td>
                                        <td>{{ $value->color }}</td>
                                        <td>{{ $value->storage }}</td>
                                        <td>{{ $value->conenction }}</td>
                                        <td>{{ $value->insurance }}</td>






                                        <td><a type="button" class="btn btn-default" title="Chỉnh sửa"
                                                href="{{ route('user.service_camera.edit', $value->id) }}"><i
                                                    class="fa fa-pencil"></i></a> 
                                          
                                                 
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



            <!-- remove brand modal -->
            @include('pages.user.camera.child.remove_popup');
          </section>
        <!-- /.content -->
    </div>
@stop
@section('javascript')
<script src={{asset("/assets/admin/dist/js/blog.js?ver=06")}}></script>       


@endsection
