@extends('layouts.user.app')
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
      <div class="col-md-12 col-xs-12">
        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$countIsWorking ?? 0}}</h3>

              <p>Đang hoạt động</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$countIsWaiting ?? 0}}</h3>

              <p>Đang chờ xét duyệt</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$countIsStopWorking ?? 0}}</h3>

              <p>Ngừng hoạt động</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-people"></i>
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-12 col-xs-12">
        <div class="col-md-9 col-xs-9">
          @include('components.user.popup_error')
          @php
            $show
          @endphp

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách {{$title}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a class="btn btn-primary" href="{{ route('user.store.create') }}">Thêm mới {{$title}}</a>

              <br /> <br />
              <table id="userTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã cửa hàng</th>
                    <th>Tên cửa hàng</th>
           
                    <th>Trỏ tên miền</th>
                    <th>Thời hạn</th>


                    <th>Trạng thái</th>

                    <th>Trạng thái thanh toán</th>
                    <th>Số tiền</th>

                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>

                  {{-- {{
                    \dd($listStores->toArray())
                  }} --}}

                  @foreach ($listStores as $key => $value)
                  @php
                  $textStatus = $value->status == "WAITING" ? "Đang chờ xử lý" : ($value->status == "WORKING" ? "Đang
                  hoạt động" : "Ngừng hoạt động");
                  $styleStatus = $value->status == "WAITING" ? "warning" : ($value->status == "WORKING" ? "success" :
                  "danger");
                  $textStatusPayment = null;
                                $styleStatusPayment = null;

                                if($value->payment_history)
                                {
                                $textStatusPayment = $value->payment_history->payment_status == "1" ? "Đã thanh toán"
                                : "Chưa thanh toán";
                                $styleStatusPayment = $value->payment_history->payment_status == "1" ?
                                "active-column-success" : "active-column-failure";
                                }
                  @endphp
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ $value->store_code }}</td>
                    <td><a href="{{route("user.dashboard.index" , $value->store_code)}}">{{ $value->name  }}</a></td>
         

                    @if(isset($value->theme->domain))
                    <td  class="">
                      <a href="http://{{$value->theme->domain}}"><i>{{$value->theme->domain}}</i></a>
                    </td>
                    @else
                    <td  class="">
                      <i>Chưa có tên miền</i>
                    </td>
                    @endif
               

                    <td>{{$value->payment_history->date_expired ?? null}}</td>
                    <td style="font-weight: 700" class="text-{{$styleStatus}}">{{ $textStatus}}</td>
                    <td class="{{$styleStatusPayment}}">{{ $textStatusPayment }} <a href='{{route("payment_history.index" , $value->store_code)}}'>&nbsp;Chi tiết</a></td>
                    <td>{{ $value->rent_shop->price ?? 0 }}</td>




                    <td><a type="button" class="btn btn-default" title="Chỉnh sửa"
                        href="{{ route('user.store.edit', $value->id) }}"><i class="fa fa-pencil"></i></a>

                    </td>
                  </tr>

                  @endforeach



                </tbody>
              </table>
            </div>
            <!-- /.box-body -->

          </div>

        </div>
        <div class="col-md-3 col-xs-3">
          <div class="panel panel-default">
            <div class="panel-heading">Thông tin cá nhân</div>
            <div class="panel-body">
              <p href="#">Họ & tên: <strong class="">{{Auth::user()->name}}</strong></p>
              <p href="#">Email: <strong class="">{{Auth::user()->email}}</strong></p>
              <p href="#">SĐT: <strong class="">{{Auth::user()->phone_number ?? "Chưa cập nhật"}}</strong></p>
              <p href="#">Ngày tạo: <strong class="">{{Auth::user()->created_at}}</strong></p>

            </div>
          </div>
        </div>

      </div>
      <!-- /.row -->


  </section>
  <script src="/assets/admin/dist/js/store.js"></script>
  <!-- /.content -->
</div>
@stop