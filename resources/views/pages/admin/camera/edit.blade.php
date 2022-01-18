@extends('layouts.admin.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                CHỈNH SỬA
                <small>{{ $title }}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Bảng điều khiển</a></li>
                <li class="active">Chỉnh sửa {{ $title }}</li>
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
                        </div>
                        <form role="form" id="postForm" action="{{ route(' manage.service_camera.update', $camera->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <div class="form-group">
                                            <label>Image Preview: </label>
                                            <img src="{{ asset($camera->image_url) }}" width="150" height="150"
                                                class="img-circle">
                                            <input type="hidden" value="{{ $camera->image_url }}" name="image_url_string" />

                                        </div>

                                        <div class="form-group">

                                            <label for="product_image">Ảnh</label>
                                            <div class="kv-avatar">
                                                <div class="file-loading">
                                                    <input id="image_url" name="image_url" type="file">

                                                </div>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <label for="product_name">Tên</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $camera->name }}" placeholder="Nhập tên" autocomplete="off" />

                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Giá</label>
                                            <input type="text" class="form-control" id="name" name="price"
                                                value="{{ $camera->price }}" placeholder="Nhập giá" autocomplete="off" />

                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Giảm giá</label>
                                            <input type="text" class="form-control" id="name" name="discount"
                                                value="{{ $camera->discount }}" placeholder="Nhập giá" autocomplete="off" />

                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Màu sắc</label>
                                            <input type="text" class="form-control" id="name" name="color"
                                                value="{{ $camera->color }}" placeholder="Nhập..." autocomplete="off" />

                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Lưu trữ dữ liệu</label>
                                            <input type="text" class="form-control" id="name" name="storage"
                                                value="{{ $camera->storage }}" placeholder="Nhập..." autocomplete="off" />

                                        </div>

                                    </div>
                                    <div class="col-md-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="product_name">Độ phân giải</label>
                                            <input type="text" class="form-control" id="name" name="resolution"
                                                value="{{ $camera->resolution }}" placeholder="Nhập..."
                                                autocomplete="off" />

                                        </div>

                                        <div class="form-group">
                                            <label for="product_name">Chuẩn kết nối</label>
                                            <input type="text" class="form-control" id="name" name="connection"
                                                value="{{ $camera->connection }}" placeholder="Nhập..."
                                                autocomplete="off" />

                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Giảm nhiễu khi ánh sáng yếu</label>
                                            <input type="text" class="form-control" id="name"
                                                name="noise_reduction_in_low_light"
                                                value="{{ $camera->noise_reduction_in_low_light }}" placeholder="Nhập..."
                                                autocomplete="off" />

                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Cân bằng ánh sáng trắng</label>
                                            <input type="text" class="form-control" id="name" name="balance_white_light"
                                                value="{{ $camera->balance_white_light }}" placeholder="Nhập..."
                                                autocomplete="off" />

                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Kháng nước</label>
                                            <input type="text" class="form-control" id="name" name="water_resistant"
                                                value="{{ $camera->water_resistant }}" placeholder="Nhập..."
                                                autocomplete="off" />

                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Bảo hành</label>
                                            <input type="text" class="form-control" id="name" name="insurance"
                                                value="{{ $camera->insurance }}" placeholder="Nhập..."
                                                autocomplete="off" />

                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Dịch vụ chăm sóc khách hàng</label>
                                            <input type="text" class="form-control" id="name" name="customer_care"
                                                value="{{ $camera->customer_care }}" placeholder="Nhập..."
                                                autocomplete="off" />

                                        </div>
                                        <div class="form-group">
                                            <label for="status">Danh mục</label>
                                            <select name="category_id" id="" class="form-control">

                                                @foreach ($listCategories as $key => $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == $camera->category_id ? 'selected' : '' }}>
                                                        {{ $value->name }}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="description">Nội dung </label>

                                    <textarea id="description" name="description">{{ $camera->description }}</textarea>

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

    <link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/suneditor@latest/src/lang/ko.js"></script>

    <script src={{ asset('/assets/admin/ckeditor.js?ver=2') }}></script>
    <script src={{ asset('/assets/admin/fileinput.js?ver=03') }}></script>


    <script>
        load_ckeditor("description")
        load_fileinput("image_url");
    </script>
@endsection
