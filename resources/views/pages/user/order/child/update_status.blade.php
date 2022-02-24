<div class="modal fade" tabindex="-1" role="dialog" id="updateModal" data-keyboard="false"
data-backdrop="static">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Cập nhật {{$title}}</h4>
            <div class="progress hide-elm" id="progress-remove" style="margin-bottom: 0px !important;">
                <div class="progress-bar progress-bar-striped active" id="progress-bar-remove"
                    role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                    style="width:0%">
                    0%
                </div>
            </div>
        </div>
        <form role="form" method="post" id="postUpdate" action="" >
          @csrf
          @method('post')
            <div class="modal-body">
                <input type="hidden" id="id" name="id">

                 <div class="alert-update">
    </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary remove_posts">Xác nhận</button>
            </div>
        </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->