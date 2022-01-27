@extends('layouts.super.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
            Quản lý
        <small>{{$title}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
        <li class="active">{{$title}}</li>
      </ol>
    </section>

    <!-- Main content -->



    <section class="content">
      <!-- Small boxes (Stat box) -->
      
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>{{$countAllUser}}</h3>

                <p>Tổng người dùng</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('super.user.index') }}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>{{$countUserIsActive}}</h3>

                <p>Người dùng đang hoạt động</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('super.user.index') }}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>{{$countUserIsNotActive}}</h3>

                <p>Người dùng ngừng hoạt động</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-people"></i>
              </div>
              <a href="{{ route('super.user.index') }}" class="small-box-footer">Chi tiết<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>{{$countAllStore}}</h3>

                <p>Tổng cửa hàng



                     
                </p>
              </div>
              <div class="icon">
                <i class="ion ion-android-home"></i>
              </div>
              <a href="{{ route('super.store.index' ) }}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-olive">
              <div class="inner">
                <h3>{{$countStoreIsWaitng}}</h3>

                <p>Cửa hàng đang chờ</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('super.store.index') }}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3>{{$countStoreIsWorking}}</h3>

                <p>Cửa hàng đang hoạt động</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('super.store.index') }}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3>{{$countStoreIsStopWorking}}</h3>

                <p>Cửa hàng ngừng hoạt động</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('super.store.index') }}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
            

    </section> 
    <script src="/assets/admin/dist/js/store.js"></script>
    <!-- /.content -->
  </div> 
  @stop