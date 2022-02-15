<h3>{{$combo->name}}</h3>
<div class="thongtin-goicuoc">
    <p class="gia-goicuoc">{{number_format($combo->price,0, ',', '.')}}<span class="dongia">đ/Tháng</span></p>
    <div class="linebt"></div>
    <p class="tocdo-goicuoc"><span class="sotcodo">Download /
            Upload</span><br />{{$combo->size}}<span class="tocdogoi">Mbps</span></p>
    <div class="mota_goicuoc">
        {!!$combo->description!!}
    </div>
</div>
<div class="bt_dangky"><a onclick="showModalOrder({{$combo->id}} , '{{$combo->name}}' , '{{$badges->store_code}}')" class="dangkyngay-bt">ĐĂNG
        KÝ NGAY</a></div>

