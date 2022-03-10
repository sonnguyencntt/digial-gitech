<!DOCTYPE html>
<!--[if IE 9 ]> <html lang="vi" class="ie9 loading-site no-js"> <![endif]-->
<!--[if IE 8 ]> <html lang="vi" class="ie8 loading-site no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="vi" class="loading-site no-js">


<head>
    <!--<![endif]-->
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <meta name="host_name" content="{{ URL::to('/') }}" />

    <!-- Mirrored from fptvienthong.net/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Dec 2021 03:19:34 GMT -->
    <!-- Added by HTTrack -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <meta charset="UTF-8" />
<meta name="google-site-verification" content="SmTe2NW8628wF2jX93SJz3HMK8MGviCWgtunebSYqng" />

    <title>{{$themeView->title ?? null}}</title>

    <meta property="og:title" content="{{$themeView->title ?? null}}" />
    <link rel="icon" type="image/x-icon" href="{{URL::asset($themeView->favicon ?? null)}}">
    <meta name="keywords" content="{{$themeView->key_words ?? null}}">
    <meta property="og:image" content="{{URL::asset($themeView->favicon ?? null)}}" />
    <meta property="og:image:width" content="250" />
    <meta property="og:image:height" content="250" />

    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }

        .header-main {
            margin: 10px 0px
        }
    </style>
    <link rel="stylesheet" href={{URL::asset("css/bootstrap.css")}}>
    <link rel='stylesheet' id='wp-block-library-css' href={{
        URL::asset('wp-includes/css/dist/block-library/style.min41a3.css?ver=5.8') }} type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-7-css' href={{
        URL::asset('wp-content/plugins/contact-form-7/includes/css/styles4245.css?ver=5.5.2') }} type='text/css'
        media='all' />
    <link rel="stylesheet" href={{asset("assets/customer/css/style.css?v=04")}}>

    <link rel='stylesheet' id='extendify-sdk-utility-classes-css' href={{
        URL::asset('wp-content/plugins/ml-slider/extendify-sdk/public/build/extendify-utilities70dc.css?ver=11.7') }}
        type='text/css' media='all' />
    <link rel='stylesheet' id='toc-screen-css' href={{
        URL::asset('wp-content/plugins/table-of-contents-plus/screen.min673a.css?ver=2002') }} type='text/css'
        media='all' />
    <link rel='stylesheet' id='flatsome-icons-css' href={{
        URL::asset('wp-content/themes/vung5/assets/css/fl-iconsae34.css?ver=3.12') }} type='text/css' media='all' />
    <link rel='stylesheet' id='popup-maker-site-css' href={{
        URL::asset('wp-content/uploads/sites/37/pum/pum-site-styles-37dc06.css?generated=1638112599&amp;ver=1.16.3') }}
        type='text/css' media='all' />
    <link rel='stylesheet' id='flatsome-main-css' href={{
        URL::asset('wp-content/themes/vung5/assets/css/flatsome0fa4.css?ver=3.13.3') }} type='text/css' media='all' />
    <link rel='stylesheet' id='flatsome-style-css' href={{ URL::asset('wp-content/themes/vung5/style0fa4.css?ver=03') }}
        type='text/css' media='all' />
    <link rel='stylesheet' id='flatsome-googlefonts-css'
        href='http://fonts.googleapis.com/css?family=%3Aregular%2C%2C%2C%7CDancing+Script%3Aregular%2C400&amp;display=swap&amp;ver=3.9'
        type='text/css' media='all' />
    <link rel='stylesheet' href={{ URL::asset('css/main.css?v=03') }} type='text/css' media='all' />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
    @yield('css')


</head>

<body
    class="home page-template page-template-page-blank page-template-page-blank-php page page-id-21 lightbox nav-dropdown-has-arrow nav-dropdown-has-shadow nav-dropdown-has-border">


    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>

    <div id="wrapper">


        @include('components.header')



        @yield('content')
        @include('components.footer')


    </div>

    @include('components.menu')

    @include('components.booking')

    @include('components.hotline')


    {{--
    <link rel='stylesheet' id='metaslider-flex-slider-css'
        href='wp-content/plugins/ml-slider/assets/sliders/flexslider/flexslider28fc.css?ver=3.23.3' type='text/css'
        media='all' property='stylesheet' />
    <link rel='stylesheet' id='metaslider-public-css'
        href='wp-content/plugins/ml-slider/assets/metaslider/public28fc.css?ver=3.23.3' type='text/css' media='all'
        property='stylesheet' /> --}}
    <script type='text/javascript' src='wp-includes/js/dist/vendor/regenerator-runtime.minb36a.js?ver=0.13.7'
        id='regenerator-runtime-js'></script>
    <script type='text/javascript' src='wp-includes/js/dist/vendor/wp-polyfill.min2c7c.js?ver=3.15.0'
        id='wp-polyfill-js'></script>

</body>
{{-- <script type='text/javascript' src={{ URL::asset('wp-includes/js/jquery/jquery.minaf6c.js?ver=3.6.0') }}
    id='jquery-core-js'></script>
<script type='text/javascript' src={{ URL::asset('wp-includes/js/jquery/jquery-migrate.mind617.js?ver=3.3.2') }}
    id='jquery-migrate-js'></script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
<script type='text/javascript' src={{ URL::asset('js/main.js?v=01') }} id='jquery-migrate-js'></script>

@yield('javascript')

</html>