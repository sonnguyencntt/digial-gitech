<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href={{asset("assets/admin/bower_components/font-awesome/css/font-awesome.min.css")}}>
  <link rel="stylesheet" href={{asset("assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css")}}>

  <!-- Font Awesome -->
  {{-- <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css"> --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" /> --}}
  <!-- Ionicons -->
  <link rel="stylesheet" href={{asset("assets/admin/bower_components/Ionicons/css/ionicons.min.css")}}>
  <!-- Theme style -->
  <link rel="stylesheet" href={{asset("assets/admin/dist/css/AdminLTE.min.css?ver=02")}}>
  <link rel="stylesheet" href={{asset("assets/admin/dist/css/mystyle.css")}}>

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href={{asset("assets/admin/dist/css/skins/_all-skins.min.css")}}>
  <!-- Morris chart -->
  <link rel="stylesheet" href={{asset("assets/admin/bower_components/morris.js/morris.css")}}>
  <!-- jvectormap -->
  <link rel="stylesheet" href={{asset("assets/admin/bower_components/jvectormap/jquery-jvectormap.css?ver=02")}}>
  <!-- Date Picker -->
  <link rel="stylesheet"
    href={{asset("assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}>
  <!-- Daterange picker -->
  <link rel="stylesheet" href={{asset("assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css")}}>
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href={{asset("assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}>
  <link rel="stylesheet" href={{asset("assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}>
  <!-- Select2 -->
  <link rel="stylesheet" href={{asset("assets/admin/bower_components/select2/select2.full.min.css")}}>
  <link rel="stylesheet" href={{asset("assets/admin/plugins/fileinput/fileinput.min.css")}}>
  <script src={{asset("assets/admin/bower_components/jquery/dist/jquery.min.js")}}></script>

  <script src={{asset("assets/admin/bower_components/select2/select2.full.min.js")}}></script>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- jQuery 3 -->
  <!-- jQuery UI 1.11.4 -->

  <!-- Bootstrap 3.3.7 -->
  <script src={{asset("assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js")}}></script>
  <script src={{asset("assets/admin/bower_components/chart/chart.js")}}></script>
  <script src={{asset("assets/admin/plugins/fileinput/fileinput.min.js")}}></script>

  <!-- Morris.js charts -->
  <!-- AdminLTE App -->
  <script src={{asset("assets/admin/dist/js/adminlte.min.js?ver=02")}}></script>

  <!-- AdminLTE for demo purposes -->
  <script src={{asset("assets/admin/dist/js/demo.js?ver=02")}}></script>



  <!-- DataTables -->
  <script src={{asset("assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js")}}></script>
  <script src={{asset("assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js")}}></script>


  @yield('css')


</head>]
<style>
  ::-webkit-scrollbar {
    width: 3px;  /* Remove scrollbar space */
    background: transparent;  /* Optional: just make scrollbar invisible */
}
::-webkit-scrollbar-thumb {
    background: #2b356b;
}
</style>


<body class="skin-blue sidebar-mini wysihtml5-supported fixed" style="height: auto; min-height: 100%;">
  <div class="wrapper" style="height: auto; min-height: 100%;">
    @include('components.super.header')

    @include('components.super.sidebar')
   
  
   @yield('content')


    @include('components.super.footer')


  </div>
</body>
<script src={{asset("assets/admin/dist/js/function.js?ver=05")}}></script>

<script src={{asset("assets/admin/dist/js/callajax.js?ver=01")}}></script>

<script src={{asset("assets/admin/dist/js/chart.js")}}></script>
@yield('javascript')



</html>