<h3>{{$combo->name}}</h3>
<div class="thongtin-goicuoc">
    <p class="gia-goicuoc">{{$combo->price}}<span class="dongia">đ/Tháng</span></p>
    <div class="linebt"></div>
    <p class="tocdo-goicuoc"><span class="sotcodo">Download /
            Upload</span><br />{{$combo->size}}<span class="tocdogoi">Mbps</span></p>
    <div class="mota_goicuoc">
        {!!$combo->description!!}
    </div>
</div>
<div class="bt_dangky"><a data-toggle="modal" data-target="#bookingModal" class="dangkyngay-bt">ĐĂNG
        KÝ NGAY</a></div>