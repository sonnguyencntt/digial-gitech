@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý
        <small>Khách hàng</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Bảng điều khiển</a></li>
        <li class="active">Quản lý khách hàng</li>
      </ol>
    </section>

    <!-- Main content -->



    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div id="messages">
            @if (\Session::has('flag'))
                <div class="alert alert-{{\Session::get('flag')}} alert-dismissible show"
                    role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span></button><strong>{{\Session::get('message')}} <span
                            class="glyphicon glyphicon-ok-sign"></span></strong>
                </div>

            @endif


        </div>

        


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách khách hàng</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="manageTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>ID Khách hàng</th>

                    <th>Họ và tên</th>
                    <th>Email</th>

                    <th>Dịch vụ tư vấn</th>
                    <th>Nội dung</th>

                   <th>Hành động</th>

                  </tr>
                </thead>
                <tbody>
                 
                  @foreach ($contact as $key => $value)
                  <tr>
                      <td></td>
                      <td>{{ $value->id_lien_he_khach_hang }}</td>
                   
                      <td>{{ $value->ho_va_ten }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->dich_vu_tu_van }}</td>
                      <td>{{ $value->noi_dung }}</td>

                      <td> 
                            <a type="button" class="btn btn-default"  title="Xóa"  data-toggle="modal" data-target="#removeModal"
                            onclick="removeFunc('{{$value->id_lien_he_khach_hang}}')"><i
                                  class="fa fa-trash"></i></a>
                               
                                </td>
                              </tr>

                  @endforeach
                
            

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>

      <div class="modal fade" tabindex="-1" role="dialog" id="removeModal" data-keyboard="false"
      data-backdrop="static">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                          aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Xóa bài viết</h4>
                  <div class="progress hide-elm" id="progress-remove" style="margin-bottom: 0px !important;">
                      <div class="progress-bar progress-bar-striped active" id="progress-bar-remove"
                          role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                          style="width:0%">
                          0%
                      </div>
                  </div>
              </div>
              <form role="form"   method="post" id="remove">
                @method('delete')
                  <div class="modal-body">
                      <input type="hidden" id="lienhe" name="lienhe">

                       <div class="alert-remove">
          </div> 
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary remove_contact">Xóa</button>
                  </div>
              </form>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
    </section>
    <!-- /.content -->
  </div>
  @stop
  @section('javascript')
  <script src={{asset("/assets/admin/dist/js/contact.js?ver=03")}}></script>       

  @endsection