@extends('layouts.app')
@section('content')
<main id="main" class="">


    <div id="content" role="main" class="content-area">
    
            
                <div class="row row-full-width align-middle align-center internet-ca-nhan-page"  id="row-1519691985">
    
        <div id="col-484269059" class="col small-12 large-12"  >
            <div class="col-inner text-center"  >
                
                
    <div class="container section-title-container" ><h1 class="section-title section-title-center"><b></b><span class="section-title-main" > {{$title}}</span><b></b></h1></div>
            </div>
                </div>
    
        
    </div>
    <div class="row"  id="row-1028417127">
    
        <div id="col-521137341" class="col small-12 large-12"  >
            <div class="col-inner"  >
                
                
        <div id="gap-1264737179" class="gap-element clearfix" style="display:block; height:auto;">
            
    <style>
    #gap-1264737179 {
      padding-top: 50px;
    }
    </style>
        </div>
    {{-- hiển thị thông tin internet    --}}
    <ul class="goi_cuoc_home">
        @foreach($list_internet as $internet)
            <li class="col_li-3 internet-ca-nhan">
                <h3>Super 80</h3> 
                <div class="thongtin-goicuoc">
                        <p class="gia-goicuoc">{{$internet->price}}<span class="dongia">đ/Tháng</span></p>
                        <div class="linebt"></div>
                        <p class="tocdo-goicuoc"><span class="sotcodo">Download / Upload</span><br />{{$internet->size}}<span class="tocdogoi">Mbps</span></p>
                        <div class="mota_goicuoc"> 
                                <p>{{$internet->description}}</p>
                                
                                
                        </div>
                        </div>
                        <div class="bt_dangky"><a href="#" data-goi-cuoc=" Super 80" data-gia="200.000" class="dangkyngay-bt">ĐĂNG KÝ NGAY</a></div>
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
    <div class="hhv-uu-dai box-element-detail" data-v-55576caf="">
    <p style="text-align: center;">* Phạm vi áp dụng: <strong>Tại </strong><strong>TP Hồ Chí Minh.</strong></p>
    <p style="text-align: center;">Giá trên chưa bao gồm VAT*</p>
    </div>
    <div class="hhv-pay-total box-element-detail" data-v-55576caf=""></div>
            </div>
                </div>
    
        
    </div>
    <div class="row"  id="row-33558127">
    
        <div id="col-1901360608" class="col small-12 large-12"  >
            <div class="col-inner"  >
                
                
    <div class="row"  id="row-1087179226">
    
        <div id="col-682503188" class="col medium-6 small-12 large-6"  >
            <div class="col-inner"  >
                
                
    <div class="container section-title-container" ><h2 class="section-title section-title-normal"><b></b><span class="section-title-main" >Thông tin chi tiết</span><b></b></h2></div>
    <ul>
    <li>Phù hợp với cá nhân, hộ gia đình</li>
    <li>Miễn phí lắp đặt kèm trang thiết bị modem wifi</li>
    <li><span style="color: #ed1c24;"><strong>ƯU ĐÃI ĐẶC BIỆT</strong></span></li>
    </ul>
    <p style="padding-left: 40px;"><span style="color: #333333;">&#8211;  Tặng<strong> 2</strong> tháng sử dụng miễn phí khi khách hàng chọn gói trả trước <strong>6</strong> tháng</span></p>
    <p style="padding-left: 40px;"><span style="color: #333333;">&#8211;  Tặng <strong>3</strong> tháng sử dụng miễn phí khi khách hàng chọn gói trả trước <strong>12</strong> tháng</span></p>
    <ul>
    <li>
    <div><span style="color: #ed1c24;">* <strong>Phí Lắp đặt</strong></span> (Đã bao gồm thuế VAT):</div>
    <div>&#8211; Khách hàng đóng trước cước 3- 6 &#8211; 12 tháng: Miễn phí lắp đặt.</div>
    <div>&#8211; Khách hàng Đóng cước hàng tháng: Phí hòa mạng 500.000đ.</div>
    </li>
    <li>Lắp đặt nhanh chóng trong vòng 24h,</li>
    <li>Hỗ trợ  kỹ thuật 24/7</li>
    <li>Đăng ký dễ dàng tiện lợi qua số tổng đài hoặc trực tiếp tại cửa hàng FPT trên toàn quốc.</li>
    </ul>
            </div>
                </div>
    
        
    
        <div id="col-1649113022" class="col medium-6 small-12 large-6"  >
            <div class="col-inner"  >
                
                
    <div class="container section-title-container" ><h2 class="section-title section-title-normal"><b></b><span class="section-title-main" >Ưu điểm</span><b></b></h2></div>
    <ul class="function">
    <li>
    <div class="col-xs-10 col-sm-11">Tốc độ truy cập Internet cao, lên đến 1Gigabit/giây (1Gbps)</div>
    </li>
    <li>
    <div class="col-xs-10 col-sm-11">Chất lượng tín hiệu ổn định, không bị ảnh hưởng bởi thời tiết, chiều dài cáp…</div>
    </li>
    <li>
    <div class="col-xs-10 col-sm-11">Thiết bị an toàn (không sợ sét đánh lan truyền trên đường dây)</div>
    </li>
    <li>
    <div class="col-xs-10 col-sm-11">Đăng ký dễ dàng, tiện lợi qua tổng đài, trên website trực tuyến hoặc tại hệ thống các văn phòng giao dịch của FPT Telecom trải dài trên toàn quốc</div>
    </li>
    <li>
    <div class="col-xs-10 col-sm-11">Thời gian lắp đặt dịch vụ nhanh chóng, tối đa là 3-5 ngày</div>
    </li>
    <li>
    <div class="col-xs-10 col-sm-11">Quản lý cước rõ ràng</div>
    </li>
    <li>
    <div class="col-xs-10 col-sm-11">Chăm sóc và hỗ trợ giải đáp khách hàng 24/7</div>
    </li>
    <li>
    <div class="col-xs-10 col-sm-11">Dễ dàng nâng cấp băng thông mà không cần kéo cáp mới</div>
    </li>
    <li>
    <div>
    <div> Đáp ứng hiệu quả cho các ứng dụng Công nghệ thông tin hiện đại như: Hosting Server riêng, VPN (mạng riêng ảo), Truyền dữ liệu, Game Online, IPTV (truyền hình tương tác), VoD (xem phim theo yêu cầu), Video Conferrence (hội nghị truyền hình), IP Camera,…</div>
    </div>
    </li>
    </ul>
            </div>
                </div>
    
        
    </div>
            </div>
                </div>
    
        
    </div>
            
                    
    </div>
    
    
    
    </main>
@stop