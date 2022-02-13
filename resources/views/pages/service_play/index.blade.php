@extends('layouts.app')
@section('content')

<main id="main" class="">


    <div id="content" role="main" class="content-area">
    
            
                <div class="row row-full-width align-middle align-center internet-ca-nhan-page"  id="row-1462444725">
    
        <div id="col-1564735043" class="col small-12 large-12"  >
            <div class="col-inner text-center"  >
                
                
    <div class="container section-title-container" ><h1 class="section-title section-title-center"><b></b><span class="section-title-main" >FPT PLAY</span><b></b></h1></div>
            </div>
                </div>
    
        
    </div>
    <div class="row"  id="row-1191021855">
    
        <div id="col-497454050" class="col small-12 large-12"  >
            <div class="col-inner"  >
                
                
        <div id="gap-1412093809" class="gap-element clearfix" style="display:block; height:auto;">
            
    <style>
    #gap-1412093809 {
      padding-top: 50px;
    }
    </style>
        </div>
        
{{-- thông tin chi tiết  FPTPLAY --}}
            
@includeWhen(count($listPlay) > 0, 'pages.service_play.child.playinfor' )   
    </div>
    
    
    
    </main>

    @stop