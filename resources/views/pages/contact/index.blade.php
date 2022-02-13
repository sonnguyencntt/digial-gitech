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
        <div class="row" id="row-252565475">

            <div id="col-1290001289" class="col medium-6 small-12 large-6">
                <div class="col-inner">


                    <div class="container section-title-container">
                        <h2 class="section-title section-title-normal"><b></b><span class="section-title-main">Thông tin
                                liên hệ</span><b></b></h2>
                    </div>
                    {{-- hiển thị thông tin contact --}}
                    @foreach ($themeView as $themeView)


                    <p> <strong><span class="text-f37021">Địa chỉ:</span></strong> <a
                            href="https://www.google.com/maps/place/FPT+Telecom/@10.7602159,106.7379094,16z/data=!4m8!1m2!2m1!1zTMO0IDM3LTM5QSwgxJHGsOG7nW5nIDE5LCBLQ1ggVMOibiBUaHXhuq1uLCBQaMaw4budbmcgVMOibiBUaHXhuq1uIMSQw7RuZywgUXXhuq1uIDc!3m4!1s0x317525ea5fc1b879:0x2f8d8851ef4a585a!8m2!3d10.766092!4d106.743751"
                            target="_blank" rel="noreferrer noopener">
                            {{$themeView->address}}</a><br />
                        <strong>Hotline:</strong> <strong><a href="sdf">{{$themeView->hotline}}</a></strong>
                    </p>
                    <p><strong>Email:</strong> <a href="werwer">{{$themeView->email}}</a></p>

                    @endforeach
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