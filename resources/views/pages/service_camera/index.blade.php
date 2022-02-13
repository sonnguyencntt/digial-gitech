@extends('layouts.app')
@section('content')

<main id="main" class="">


    <div id="content" role="main" class="content-area">
    
            
                <div class="row row-full-width align-center camera-fpt"  id="row-2120305059">
    
        <div id="col-1078885225" class="col small-12 large-12"  >
            <div class="col-inner"  >
                
                
        <div id="text-2225036838" class="text">
            
    <h1 style="text-align: center;">{{$cateogryName->category->name}}</h1>
            
    <style>
    #text-2225036838 {
      text-align: center;
    }
    </style>
        </div>
        
            </div>
            
    <style>
    #col-1078885225 > .col-inner {
      padding: 0 0px 0px 0px;
      margin: 0 0px 0px 0px;
    }
    </style>
        </div>
    
        
    </div>
    <div class="row"  id="row-1781176106">
    
        <div id="col-104731332" class="col small-12 large-12"  >
            <div class="col-inner"  >
                
                
        <div id="gap-2124182740" class="gap-element clearfix" style="display:block; height:auto;">
            
    <style>
    #gap-2124182740 {
      padding-top: 50px;
    }
    </style>
        </div>
        
    <p style="text-align: left;">FPT Camera là một sản phẩm công nghệ của Công ty cổ phần viễn thông FPT (FPT Telecom), được ra mắt thị trường Việt Nam vào năm 2019. Với mục tiêu phục vụ khách hàng có nhu cầu giám sát an ninh, FPT Camera đem tới một dịch vụ tiện lợi – thông minh, hỗ trợ giám sát an toàn và bảo mật thông tin tại tư gia.</p>
    <p style="text-align: left;">Ưu điểm chính của FPT Camera là ổn định về tín hiệu, chất lượng hình ảnh cao, kết nối với nhiều thiết bị di động, sử dụng lưu trữ Cloud. Bên cạnh đó, khách hàng luôn luôn được FPT đồng hành cùng quá trình sử dụng về bảo hành, bảo trì, hỗ trợ trực tuyến 24/7.</p>
    {{-- thông tin camera --}}
    @includeWhen($getFirstID and $getSecondID , 'pages.service_camera.child.camerainfor' )
        
        <div id="gap-912276532" class="gap-element clearfix" style="display:block; height:auto;">
            
    <style>
    #gap-912276532 {
      padding-top: 30px;
    }
    </style>
        </div>
        
            </div>
                </div>
    
        
    </div>
    {{-- gói lưu trữ --}}
    @includeWhen(count($storage)>0 , 'pages.service_camera.child.storage' )

    <div class="row row-full-width align-center"  id="row-403815517">
    
        <div id="col-1725932685" class="col small-12 large-12"  >
            <div class="col-inner" style="background-color:rgb(251, 247, 247);" >
                
                
        <div id="gap-1746104831" class="gap-element clearfix" style="display:block; height:auto;">
            
    <style>
    #gap-1746104831 {
      padding-top: 30px;
    }
    </style>
        </div>
        
    <div class="container section-title-container" ><h3 class="section-title section-title-normal"><b></b><span class="section-title-main" >ƯU ĐIỂM CỦA FPT CAMERA</span><b></b></h3></div>
        <div id="gap-922470528" class="gap-element clearfix" style="display:block; height:auto;">
            
    <style>
    #gap-922470528 {
      padding-top: 30px;
    }
    </style>
        </div>
        
    <div class="row align-center"  id="row-750209401">
    
    {!!$cateogryName->category->advantage!!}
    
        
    </div>
            </div>
                </div>
    
        
    
    <style>
    #row-403815517 > .col > .col-inner {
      background-color: rgb(255, 255, 255);
    }
    </style>
    </div>
    {{-- tính năng của camera fpt --}}
    @include('pages.service_camera.child.feature' )
                    
    </div>
    
    
    
    </main>

    @stop