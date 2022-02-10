@extends('layouts.admin.app')
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
        @include('components.admin.popup_error')
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
          </div>
          <form role="form" action="{{route("admin.config.update" ,  $config->id)}}" method="post"  >
            @csrf
            @method('put')
            <div class="box-body">
           

                  <div class="form-group">
                    <label for="email">Chọn mẫu cửa hàng</label>
                    <select name="store_sample_code" id="" class="form-control">
                      <option value="">--Chọn cửa hàng--</option>

                      @foreach($listStores as $key => $value)
                      <option value="{{$value->store_code}}" {{$value->store_code == $config->store_sample_code ? "selected" : ""}}
                        >{{$value->store_code}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>














            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary ">Lưu</button>
            </div>
          </form>
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