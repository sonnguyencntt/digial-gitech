@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">

<section class="page_404">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="col-sm-10 col-sm-offset-1  text-center">
                    <div class="four_zero_four_bg">
                        <h1 class="text-center ">404</h1>


                    </div>

                    <div class="contant_box_404">
                        <h3 class="h2">
                            Giống như bạn đang bị lạc!!
                                                </h3>

                        <p>Trang bạn đang tìm kiếm không có sẵn!</p>

                        <a href="{{route("admin.dashboard.index")}}" class="link_404">Trở về trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>
    @stop
