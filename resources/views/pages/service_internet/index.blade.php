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
    @includeWhen(count($list_internet) > 0, 'pages.service_internet.child.combo' )


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
                
                
    {{-- hiển thị thông tin chi tiết và ưu điểm --}}
    @includeWhen(count(array($getCategory)) > 0, 'pages.service_internet.child.information' )
                    
    </div>
    
    
    
    </main>
@stop