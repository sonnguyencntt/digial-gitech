@extends('layouts.app')
@section('content')

<main id="main" class="">


    <div id="content iframe-position" role="main" class="content-area">

    
            
                <div class="row row-full-width bando-lienhepage"  id="row-2035417477">
    
        <div id="col-565922035" class="col small-12 large-12"  >
            <div class="col-inner"  >
                
                
         {!!$themeView->iframe_position!!}
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

@section("javascript")
<script>
   $(document).ready(function () {
        $("iframe").width("100%");
        $("iframe").height(300);
    });
</script>
@endsection
@stop
