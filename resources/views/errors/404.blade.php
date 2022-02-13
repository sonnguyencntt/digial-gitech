@extends('layouts.app')
@section('content')
<main id="main" class="">


    <div id="content" role="main" class="content-area">

        
        <section class="page_404">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="col-sm-offset-1  text-center">
                            <div class="four_zero_four_bg">
                                <h1 class="text-center ">403</h1>
        
        
                            </div>
        
                            <div class="contant_box_404">
                                <h3 class="h2">
                                        Hình như có lỗi xãy ra!
                                        
                                                        </h3>
        
                                <p> 
                                    @if(isset($msg))
                                    {{$msg}}
                                    @else
                                    Trang bạn đang tìm kiếm không có sẵn!
                                    @endif
                                </p>
        
                                <a href="{{route("home.index" , $badges->store_code)}}" class="link_404">Trở về trang chủ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
       
        






</main>
@stop