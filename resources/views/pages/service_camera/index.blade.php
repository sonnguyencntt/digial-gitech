@extends('layouts.app')
@section('content')

<main id="main" class="">


    <div id="content" role="main" class="content-area">
    
            
                <div class="row row-full-width align-center camera-fpt"  id="row-2120305059">
    
        <div id="col-1078885225" class="col small-12 large-12"  >
            <div class="col-inner"  >
                
                
        <div id="text-2225036838" class="text">
            
    <h1 style="text-align: center;">{{$title}}</h1>
            
    <style>
    #text-2225036838 {
      text-align: center;
    }
    </style>
        </div>
        
            </div>
            
    <style>
    #col-1078885225 > .col-inner {
      padding: 0 0px 0px 0px;
      margin: 0 0px 0px 0px;
    }
    </style>
        </div>
    
        
    </div>
    <div class="row"  id="row-1781176106">
    
        <div id="col-104731332" class="col small-12 large-12"  >
            <div class="col-inner"  >
                
                
        <div id="gap-2124182740" class="gap-element clearfix" style="display:block; height:auto;">
            
    <style>
    #gap-2124182740 {
      padding-top: 50px;
    }
    </style>
        </div>
        
    <p style="text-align: left;">FPT Camera là một sản phẩm công nghệ của Công ty cổ phần viễn thông FPT (FPT Telecom), được ra mắt thị trường Việt Nam vào năm 2019. Với mục tiêu phục vụ khách hàng có nhu cầu giám sát an ninh, FPT Camera đem tới một dịch vụ tiện lợi – thông minh, hỗ trợ giám sát an toàn và bảo mật thông tin tại tư gia.</p>
    <p style="text-align: left;">Ưu điểm chính của FPT Camera là ổn định về tín hiệu, chất lượng hình ảnh cao, kết nối với nhiều thiết bị di động, sử dụng lưu trữ Cloud. Bên cạnh đó, khách hàng luôn luôn được FPT đồng hành cùng quá trình sử dụng về bảo hành, bảo trì, hỗ trợ trực tuyến 24/7.</p>
        <div id="text-2439325895" class="text banggia-camera">
            
    <table border="1" width="100%">
    <tbody>
    <tr style="background: #f17124;">
    <td></td>
    <td><span style="color: #ffffff;"><strong>{{$getFirstID->name}}</strong></span></td>
    <td><span style="color: #ffffff;"><strong>{{$getSecondID->name}}</strong></span></td>
    </tr>
    <tr>
    <td>Hình ảnh</td>
    <td style="text-align: center;"><img loading="lazy" src={{$getFirstID->image_url}} alt="" width="300" height="300" class="alignnone size-medium wp-image-453" srcset="{{$getFirstID->image_url}} 300w, {{$getFirstID->image_url}} 150w, {{$getFirstID->image_url}} 768w, {{$getFirstID->image_url}} 900w" sizes="(max-width: 300px) 100vw, 300px" /></td>
    <td style="text-align: center;"><img loading="lazy" src={{$getSecondID->image_url}} alt="" width="300" height="200" class="alignnone size-medium wp-image-454" srcset="{{$getSecondID->image_url}} 300w, {{$getSecondID->image_url}} 470w" sizes="(max-width: 300px) 100vw, 300px" /></td>
    </tr>
    <tr>
    <td>Màu sắc</td>
    <td>{{$getFirstID->color}}</td>
    <td>{{$getSecondID->color}}</td>
    </tr>
    <tr>
    <td>Lưu trữ dữ liệu</td>
    <td ><a href=""><strong>{{$getFirstID->storage}}
    </strong></a></td>
    <td ><a href=""><strong>{{$getSecondID->storage}}</strong></a></td>
    </tr>
    <tr>
    <td>Độ phân giải</td>
    <td>{{$getFirstID->resolution}}</td>
    <td>{{$getSecondID->resolution}}</td>
    </tr>
    <tr>
    <td>Chuẩn kết nối</td>
    <td><strong>{{$getFirstID->connection}}</strong></td>
    <td><strong>{{$getSecondID->connection}}</strong></td>
    </tr>
    <tr>
    <td>Giảm nhiễu<br />
    khi ánh sáng yếu</td>
    <td>{{$getFirstID->noise_reduction_in_low_light}}</td>
    <td>{{$getSecondID->noise_reduction_in_low_light}}</td>
    </tr>
    <tr>
    <td>Cân bằng<br />
    ánh sáng trắng</td>
    <td>{{$getFirstID->balance_white_light}}</td>
    <td>{{$getSecondID->balance_white_light}}</td>
    </tr>
    <tr>
    <td>Kháng nước</td>
    <td>{{$getFirstID->water_resistant}}</td>
    <td>{{$getSecondID->water_resistant}}</td>
    </tr>
    <tr>
    <td>Bảo hành</td>
    <td><strong>{{$getFirstID->insurance}}</strong></td>
    <td><strong>{{$getSecondID->insurance}}</strong></td>
    </tr>
    <tr>
    <td>Dịch vụ<br />
    chăm sóc<br />
    khách hàng</td>
    <td>{{$getFirstID->customer_care}}</td>
    <td>{{$getSecondID->customer_care}}</td>
    </tr>
    <tr>
    <td>Giá sản phẩm</td>
    <td>
    <p style="text-align: center;"><span style="color: #f26522;"><strong>{{$getFirstID->discount}} vnđ</strong></span></p>
    <p style="text-align: center;"><span style="color: #898888; text-decoration: line-through; font-family: 'UTM Avo'; font-size: 15px;"><strong>{{$getFirstID->price}} vnđ</strong></span></p>
    <p style="text-align: center;">* Giá trên đã bao gồm VAT</p>
    <div class="bt_dangky"><a class="dangkyngay-bt" href="#">ĐĂNG KÝ NGAY</a></div>
    </td>
    <td>
    <p style="text-align: center;"><span style="color: #f26522;"><strong>{{$getSecondID->discount}}</strong></span></p>
    <p style="text-align: center;"><span style="color: #898888; text-decoration: line-through; font-family: 'UTM Avo'; font-size: 15px;"><strong>{{$getSecondID->price}} vnđ</strong></span></p>
    <p style="text-align: center;">* Giá trên đã bao gồm VAT</p>
    <div class="bt_dangky"><a class="dangkyngay-bt" href="#">ĐĂNG KÝ NGAY</a></div>
    </td>
    </tr>
    </tbody>
    </table>
                </div>
        
        <div id="gap-912276532" class="gap-element clearfix" style="display:block; height:auto;">
            
    <style>
    #gap-912276532 {
      padding-top: 30px;
    }
    </style>
        </div>
        
            </div>
                </div>
    
        
    </div>
    <div class="row row-full-width uudiencamera-page"  id="row-1122803881">
    
        <div id="col-716478819" class="col small-12 large-12"  >
            <div class="col-inner"  >
                
                
        <div id="gap-1014587657" class="gap-element clearfix" style="display:block; height:auto;">
            
    <style>
    #gap-1014587657 {
      padding-top: 30px;
    }
    </style>
        </div>
        
        <div id="text-1301830475" class="text">
            
    <h2>GÓI LƯU TRỮ</h2>
            
    <style>
    #text-1301830475 {
      text-align: center;
    }
    </style>
        </div>
        
        <div id="gap-1343656366" class="gap-element clearfix" style="display:block; height:auto;">
            
    <style>
    #gap-1343656366 {
      padding-top: 30px;
    }
    </style>
        </div>
        
    <div class="row"  id="row-173350997">
    
        <div id="col-8861296" class="col medium-4 small-12 large-4"  >
            <div class="col-inner"  >
                
                
        <div id="text-4082509737" class="text goicamera">
            
    <h3>Gói lưu trữ 1 ngày</h3>
    <p class="giacamera">22.000<br />
    <span class="donvitinh">VNĐ/Tháng/1 Camera</span></p>
    <ul class="thongtinkem">
    <li>Lưu trữ &amp; xem lại: 01 ngày trước</li>
    <li>Video chất lượng: Full HD &#8211; 1080p</li>
    <li>1+2 Tài khoản sử dụng</li>
    <li>Cảnh báo thông minh</li>
    <li>Ưu đãi tới 02 tháng khi trả trước từ 5 tháng</li>
    </ul>
    <div class="bt_dangky"><a class="dangkyngay-bt" href="#">ĐĂNG KÝ NGAY</a></div>
                </div>
        
            </div>
                </div>
    
        
    
        <div id="col-1164531670" class="col medium-4 small-12 large-4"  >
            <div class="col-inner"  >
                
                
        <div id="text-1665593737" class="text goicamera">
            
    <h3>Gói lưu trữ 3 ngày</h3>
    <p class="giacamera">33.000<br />
    <span class="donvitinh">VNĐ/Tháng/1 Camera</span></p>
    <ul class="thongtinkem">
    <li>Lưu trữ &amp; xem lại: 03 ngày trước</li>
    <li>Video chất lượng: Full HD &#8211; 1080p</li>
    <li>1+6 Tài khoản sử dụng</li>
    <li>Cảnh báo thông minh</li>
    <li>Ưu đãi tới 02 tháng khi trả trước từ 5 tháng</li>
    </ul>
    <div class="bt_dangky"><a class="dangkyngay-bt" href="#">ĐĂNG KÝ NGAY</a></div>
                </div>
        
            </div>
                </div>
    
        
    
        <div id="col-228778106" class="col medium-4 small-12 large-4"  >
            <div class="col-inner"  >
                
                
        <div id="text-1727064474" class="text goicamera">
            
    <h3>Gói lưu trữ 7 ngày</h3>
    <p class="giacamera">49.500<br />
    <span class="donvitinh">VNĐ/Tháng/1 Camera</span></p>
    <ul class="thongtinkem">
    <li>Lưu trữ &amp; xem lại: 07 ngày trước</li>
    <li>Video chất lượng: Full HD &#8211; 1080p</li>
    <li>1+14 Tài khoản sử dụng</li>
    <li>Cảnh báo thông minh</li>
    <li>Ưu đãi tới 02 tháng khi trả trước từ 5 tháng</li>
    </ul>
    <div class="bt_dangky"><a class="dangkyngay-bt" href="#">ĐĂNG KÝ NGAY</a></div>
                </div>
        
            </div>
                </div>
    
        
    </div>
            </div>
                </div>
    
        
    </div>
    <div class="row row-full-width align-center"  id="row-403815517">
    
        <div id="col-1725932685" class="col small-12 large-12"  >
            <div class="col-inner" style="background-color:rgb(251, 247, 247);" >
                
                
        <div id="gap-1746104831" class="gap-element clearfix" style="display:block; height:auto;">
            
    <style>
    #gap-1746104831 {
      padding-top: 30px;
    }
    </style>
        </div>
        
    <div class="container section-title-container" ><h3 class="section-title section-title-normal"><b></b><span class="section-title-main" >ƯU ĐIỂM CỦA FPT CAMERA</span><b></b></h3></div>
        <div id="gap-922470528" class="gap-element clearfix" style="display:block; height:auto;">
            
    <style>
    #gap-922470528 {
      padding-top: 30px;
    }
    </style>
        </div>
        
    <div class="row align-center"  id="row-750209401">
    
        <div id="col-327183778" class="col medium-6 small-12 large-6"  >
            <div class="col-inner"  >
                
                
    <ul>
    <li><i class="fas fa-angle-double-right"></i> Bảo mật cao với hệ thống lưu trữ dữ liệu điện toán đám mây</li>
    <li><i class="fas fa-angle-double-right"></i> Thiết kế hiện đại, phù hợp với bất kì không gian sống nào</li>
    <li><i class="fas fa-angle-double-right"></i> Không cần sử dụng đầu ghi hình.</li>
    <li><i class="fas fa-angle-double-right"></i> Không cần sử dụng ổ cứng lưu trữ dữ liệu do ứng dụng công nghệ lưu trữ điện toán đám mây.</li>
    <li><i class="fas fa-angle-double-right"></i> Tư vấn tận tình và miễn phí lắp đặt</li>
    </ul>
            </div>
                </div>
    
        
    
        <div id="col-272752579" class="col medium-6 small-12 large-6"  >
            <div class="col-inner"  >
                
                
    <ul>
    <li><i class="fas fa-angle-double-right"></i> Lắp đặt nhanh chóng trong vòng 24h, hỗ trợ kỹ thuật 24/7</li>
    <li><i class="fas fa-angle-double-right"></i> Hỗ trợ bảo trì tại nhà khi xảy ra sự cố hoàn toàn miễn phí</li>
    <li><i class="fas fa-angle-double-right"></i>Có thể kiểm tra hình ảnh mà camera thu được trực tiếp thông qua điện thoại di động.</li>
    <li><i class="fas fa-angle-double-right"></i> Đăng ký dễ dàng tiện lợi qua số tổng đài hoặc trực tiếp tại cửa hàng FPT trên toàn quốc.</li>
    </ul>
            </div>
                </div>
    
        
    </div>
            </div>
                </div>
    
        
    
    <style>
    #row-403815517 > .col > .col-inner {
      background-color: rgb(255, 255, 255);
    }
    </style>
    </div>
    <div class="row"  id="row-1216662329">
    
        <div id="col-950564036" class="col small-12 large-12"  >
            <div class="col-inner"  >
                
                
    <div class="container section-title-container" ><h3 class="section-title section-title-normal"><b></b><span class="section-title-main" >TÍNH NĂNG CỦA CAMERA FPT</span><b></b></h3></div>
        <div id="gap-1467932171" class="gap-element clearfix" style="display:block; height:auto;">
            
    <style>
    #gap-1467932171 {
      padding-top: 30px;
    }
    </style>
        </div>
        
    <div class="row"  id="row-643905210">
    
        <div id="col-869222243" class="col medium-6 small-12 large-6"  >
            <div class="col-inner"  >
                
                
        <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1922570875">
                                    <div class="img-inner dark" >
                <img width="781" height="656" src="../wp-content/uploads/sites/37/2021/06/camera.png" class="attachment-large size-large" alt="" loading="lazy" srcset="https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/camera.png 781w, https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/camera-300x252.png 300w, https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/camera-768x645.png 768w" sizes="(max-width: 781px) 100vw, 781px" />						
                        </div>
                                    
    <style>
    #image_1922570875 {
      width: 100%;
    }
    </style>
        </div>
        
            </div>
                </div>
    
        
    
        <div id="col-272219443" class="col medium-6 small-12 large-6"  >
            <div class="col-inner"  >
                
                
    <ul class="tinhnang-camera">
    <li class="tinhnang-1">Quan sát 24/7.</li>
    <li class="tinhnang-2">Theo dõi được từ xa thông qua ứng dụng <strong>Camera</strong> của <strong>FPT</strong>.</li>
    <li class="tinhnang-3">Lưu trữ dữ liệu trực tiếp trên Cloud không cần đầu ghi hình.</li>
    <li class="tinhnang-4">Đảm bảo an toàn tuyệt đối dữ liệu hình ảnh của người sử dụng</li>
    <li class="tinhnang-5">Lưu trữ dữ liệu an toàn ngay cả khi ngắt kết nối Internet.</li>
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