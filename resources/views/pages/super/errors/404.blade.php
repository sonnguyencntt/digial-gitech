
@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
    </section>

    <!-- Main content -->



    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="error_page">
        <div id="main">
            <div class="fof">
                    <h1 style="color: red;">Đã xảy ra lỗi ! Không tìm thấy bài viết ID : {{ $id}}</h1>
            </div>
        </div>
    </div>


    </section>
   
    <!-- /.content -->
  </div>
  @stop
@section('css')
    <style>
        .error_page>*{
    transition: all 0.6s;
}


.error_page>#main{
    display: table;
    width: 100%;
    height: 100vh;
    text-align: center;
}

.error_page>.fof{
	  display: table-cell;
	  vertical-align: middle;
}

.error_page>.fof .error_page>h1{
	  font-size: 50px;
	  display: inline-block;
	  padding-right: 12px;
	  animation: type .5s alternate infinite;
}

@keyframes type{
	  from{box-shadow: inset -3px 0px 0px #888;}
	  to{box-shadow: inset -3px 0px 0px transparent;}
}
    </style>
@endsection