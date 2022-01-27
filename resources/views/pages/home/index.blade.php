@extends('layouts.app')
@section('content')
<main id="main" class="">


    <div id="content" role="main" class="content-area">


        @include('pages.home.child.slider')

        <div id="gap-464267263" class="gap-element clearfix" style="display:block; height:auto;">

            <style>
                #gap-464267263 {
                    padding-top: 30px;
                }
            </style>
        </div>

        @includeWhen(count($listInternet) > 0, 'pages.home.child.internet' )


     
        @includeWhen(count($listCamera) > 0, 'pages.home.child.camera' )



        @includeWhen(count($listPosts) > 0, 'pages.home.child.posts' )



    </div>



</main>
@stop