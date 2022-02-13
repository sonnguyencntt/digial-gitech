@extends('layouts.app')
@section('content')

<main id="main" class="">


    <div id="content" role="main" class="content-area">

    
            
                <div class="row row-full-width bando-lienhepage"  id="row-2035417477">
    
        <div id="col-565922035" class="col small-12 large-12"  >
            <div class="col-inner"  >
                
                
    <p><iframe src="{{$themeView->iframe_position}}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe></p>
            </div>


        </div>
       

    
        
    </div>
    <div class="row"  id="row-252565475">
    
    {{-- thông tin liên hệ --}}
    @include( 'pages.contact.child.contactinfor' )
        
    
    {{-- ghi thông tin liên lạc --}}
    @include( 'pages.contact.child.getcontactinfor' )
        
    </div>
            
                    
    </div>



</main>
@stop