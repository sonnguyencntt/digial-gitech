
    <ul class="goi_cuoc_home">
        @foreach($list_internet as $combo)
            <li class="col_li-3 internet-ca-nhan">
                @include('components.item_internet');

                {{-- <h3>{{$internet->name}}</h3> 
                <div class="thongtin-goicuoc">
                        <p class="gia-goicuoc">{{number_format($internet->price,0, ',', '.')}}<span class="dongia">đ/Tháng</span></p>
                        <div class="linebt"></div>
                        <p class="tocdo-goicuoc"><span class="sotcodo">Download / Upload</span><br />{{$internet->size}}<span class="tocdogoi">Mbps</span></p>
                        <div class="mota_goicuoc"> 
                                {!!$internet->description!!}
                                
                                
                        </div>
                        </div>
                        <div class="bt_dangky"><a href="#" data-goi-cuoc=" Super 80" data-gia="200.000" class="dangkyngay-bt">ĐĂNG KÝ NGAY</a></div> --}}
            </li>
        @endforeach
    </ul>
                        
                        
                <script type="text/javascript">
                jQuery(document).ready(function(e) {
                    jQuery(".dangkyngay-bt").click(function(){
                        var tengoi = jQuery(this).attr("data-goi-cuoc");
                        var giagoi = jQuery(this).attr("data-gia");
                        jQuery(".class_ten_goi").val(tengoi);
                        jQuery(".class_gia_goi").val(giagoi);
                    });
                });
                </script>