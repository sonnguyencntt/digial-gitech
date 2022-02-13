<ul class="goi_cuoc_home">
    @foreach ($listPlay as $listPlay )
        
    
    <li class="col_li-3 fpt-play">
    <h3>{{$listPlay->name}}</h3>
    <div class="thongtin-goicuoc">
    <p class="gia-goicuoc">{{$listPlay->price}}<span class="dongia">đ/Tháng</span></p>
    <div class="linebt"></div>
    <div class="mota_goicuoc">
    {{$listPlay->description}}
    </div>
    </p></div>
    <div class="bt_dangky"><a href="#" data-goi-cuoc=" GÓI MAXY" data-gia="88000" class="dangkyngay-bt pum-trigger" style="cursor: pointer;">ĐĂNG KÝ NGAY</a></div>
    </li>
    @endforeach
    </ul>