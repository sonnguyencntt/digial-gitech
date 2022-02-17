<div class="row" id="row-890100484">

    <div id="col-1918005253" class="col small-12 large-12" >
        <div class="col-inner">


            <div class="container section-title-container">
                <h3 class="section-title section-title-normal"><b></b><span
                        class="section-title-main">CAMERA FPT</span><b></b></h3>
            </div>
            <div id="gap-2144562054" class="gap-element clearfix" style="display:block; height:auto;">

                <style>
                    #gap-2144562054 {
                        padding-top: 20px;
                    }
                </style>
            </div>

            <div class="row" id="row-832880509">
                @foreach ($listCamera as $camera )
                <div id="col-129715435" class="col medium-6 small-12 large-6">
                    <div class="col-inner">

                        <div id="text-3712646344" class="text camera-home">

                            <h3><a href="#">{{$camera->name}}</a></h3>
                            <div class="noidung-camera">
                                <div class="img-thumb"><img loading="lazy"
                                        class="alignnone size-medium wp-image-110"
                                        src="{{$camera->image_url}}"
                                       
                                        sizes="(max-width: 300px) 100vw, 300px" /></div>
                                <div class="text-content">
                                    {!!$camera->description!!}
                                    <div class="giasp">
                                        <div class="gia-left"><span
                                                style="color: #898888; text-decoration: line-through; font-family: 'UTM Avo'; font-size: 15px;"><strong>{{$camera ? number_format($camera->price == "" ? 0 : $camera->price ,0, ',', '.') : 0}}vnđ</strong></span></div>
                                        <div class="gia-right"><span
                                                style="color: #f26522;"><strong>{{$camera ? number_format($camera->discount == "" ? 0 : $camera->discount ,0, ',', '.') : 0}}
                                                    vnđ</strong></span></div>
                                        <p style="text-align: left;">* Giá trên đã bao gồm VAT</p>
                                    </div>
                                </div>
                            </div>
                            <div class="giasp-mb">
                                <div class="gia-left"><span
                                        style="color: #898888; text-decoration: line-through; font-family: 'UTM Avo'; font-size: 15px;"><strong>1.400.000
                                            vnđ</strong></span></div>
                                <div class="gia-right"><span style="color: #f26522;"><strong>1.000.000
                                            vnđ</strong></span></div>
                                <p style="text-align: left;">* Giá trên đã bao gồm VAT</p>
                            </div>
                            <div class="buttom-ft">
                                <div class="chitietbt"><a href="{{ route('service_camera.show',["domain" =>  $badges->domain,"cameraID"=>$camera->id])}}">Xem chi tiết</a>
                                </div>
                                <div class="dangkybt"><a class="dangkyngay-bt" onclick="showModalOrder({{$camera->id}} , '{{$camera->name}}' , '{{$badges->store_code}}')">ĐĂNG KÝ NGAY</a>
                                </div>
                            </div>
                        </div>
                        

                    </div>
                </div>



                
                @endforeach

            </div>
        </div>
    </div>













</div>
