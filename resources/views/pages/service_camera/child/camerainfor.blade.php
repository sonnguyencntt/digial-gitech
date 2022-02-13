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