@extends('layouts.app')
@section('content')
<main id="main" class="">


    <div id="content" role="main" class="content-area">
    
            
                <div class="row row-full-width align-middle align-center internet-ca-nhan-page"  id="row-1519691985">
    
        <div id="col-484269059" class="col small-12 large-12"  >
            <div class="col-inner text-center"  >
                
                
    <div class="container section-title-container" ><h1 class="section-title section-title-center"><b></b><span class="section-title-main" > {{$title}}</span><b></b></h1></div>
            </div>
                </div>
    
        
    </div>
    <div class="row"  id="row-1028417127">
    
        <div id="col-521137341" class="col small-12 large-12"  >
            <div class="col-inner"  >
                
                
        <div id="gap-1264737179" class="gap-element clearfix" style="display:block; height:auto;">
            
    <style>
    #gap-1264737179 {
      padding-top: 50px;
    }
    </style>
        </div>
    {{-- hiển thị thông tin internet    --}}
    <ul class="goi_cuoc_home">
        @foreach($list_internet as $internet)
            <li class="col_li-3 internet-ca-nhan">
                <h3>{{$internet->name}}</h3> 
                <div class="thongtin-goicuoc">
                        <p class="gia-goicuoc">{{$internet->price}}<span class="dongia">đ/Tháng</span></p>
                        <div class="linebt"></div>
                        <p class="tocdo-goicuoc"><span class="sotcodo">Download / Upload</span><br />{{$internet->size}}<span class="tocdogoi">Mbps</span></p>
                        <div class="mota_goicuoc"> 
                                {!!$internet->description!!}
                                
                                
                        </div>
                        </div>
                        <div class="bt_dangky"><a href="#" data-goi-cuoc=" Super 80" data-gia="200.000" class="dangkyngay-bt">ĐĂNG KÝ NGAY</a></div>
            </li>
        @endforeach
    </ul>
                        
                        
                <script type="text/javascript">
                jQuery(document).ready(function(e) {
                    jQuery(".dangkyngay-bt").click(function(){
                        var tengoi = jQuery(this).attr("data-goi-cuoc");
                        var giagoi = jQuery(this).attr("data-gia");
                        jQuery(".class_ten_goi").val(tengoi);
                        jQuery(".class_gia_goi").val(giagoi);
                    });
                });
                </script>
    <div class="hhv-uu-dai box-element-detail" data-v-55576caf="">
    <p style="text-align: center;">* Phạm vi áp dụng: <strong>Tại </strong><strong>TP Hồ Chí Minh.</strong></p>
    <p style="text-align: center;">Giá trên chưa bao gồm VAT*</p>
    </div>
    <div class="hhv-pay-total box-element-detail" data-v-55576caf=""></div>
            </div>
                </div>
    
        
    </div>
    <div class="row"  id="row-33558127">
    
        <div id="col-1901360608" class="col small-12 large-12"  >
            <div class="col-inner"  >
                
                
    <div class="row"  id="row-1087179226">
    
        <div id="col-682503188" class="col medium-6 small-12 large-6"  >
            <div class="col-inner"  >
                
                
    <div class="container section-title-container" ><h2 class="section-title section-title-normal"><b></b><span class="section-title-main" >Thông tin chi tiết</span><b></b></h2></div>
    <p>
        {{$getCategory->details}}
    </p>
    </div>
    </div>
    
        
    
        <div id="col-1649113022" class="col medium-6 small-12 large-6"  >
            <div class="col-inner"  >
                
                
    <div class="container section-title-container" ><h2 class="section-title section-title-normal"><b></b><span class="section-title-main" >Ưu điểm</span><b></b></h2></div>
    <p>
        {{$getCategory->advantage}}
    </p>
            </div>
                </div>
    
        
    </div>
            </div>
                </div>
    
        
    </div>
            
                    
    </div>
    
    
    
    </main>
@stop