@extends('layouts.admin.app')
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

                  <a class="btn btn-primary" href="{{ route('admin.category.create') }}">Thêm mới {{$title}}</a>

                  <br /> <br />


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Danh sách {{$title}}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="manageTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tiêu Đề</th>
                                        <th>Link Route</th>
                                        <th>Mã cửa hàng</th>

                                   

                                        <th>Ngày Đăng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>



                                    @foreach ($listCategories as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $value->name }}</td>
                                       
                                        <td>{{ $value->link_url }}</td>
                                        <td>{{ $value->store_code }}</td>


                                        <td>{{ $value->created_at }}</td>
                                        <td><a type="button" class="btn btn-default" title="Chỉnh sửa"
                                                href="{{ route('admin.category.edit',$value->id) }}"><i
                                                    class="fa fa-pencil"></i></a> 
                                                    <a type="button" class="btn btn-default"  title="Xóa"  data-toggle="modal" data-target="#removeModal"
                                                    onclick="removeFunc('{{$value->id}}' , '{{$value->name}}')"><i
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

            @include('pages.admin.category.child.remove_popup');


            <!-- remove brand modal -->
          </section>
        <!-- /.content -->
    </div>
@stop
@section('javascript')
<script src={{asset("/assets/admin/dist/js/blog.js?ver=06")}}></script>       


@endsection
