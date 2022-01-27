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

                    <a class="btn btn-primary" href="{{ route('user.service_internet.create' , $badges->store_code) }}">Thêm mới {{$title}}</a>

                    <br /> <br />


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
                                        <th>Tên gói</th>
                                        <th>Giá</th>
                                        <th>Kích cỡ</th>

                                        <th>Danh mục</th>
                                        <th>Nội dung
                                        </th>

                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>



                                    @foreach ($listInternets as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->price }}</td>
                                        <td>{{ $value->size }}</td>
                                        <td>{{ $value->category !== null ? $value->category->name : null}}</td>

                                          <td><span>
                                            {!!Str::limit($value->description , 20)!!}
                                            </span></td>
                                        <td><a type="button" class="btn btn-default" title="Chỉnh sửa"
                                                href="{{ route('user.service_internet.edit', ["store_code"=>$badges->store_code , "internet" => $value->id]) }}"><i
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



            <!-- remove brand modal -->
            @include('pages.user.internet.child.remove_popup')
          </section>
        <!-- /.content -->
    </div>
@stop
@section('javascript')
<script src={{asset("/assets/admin/dist/js/blog.js?ver=06")}}></script>       


@endsection
