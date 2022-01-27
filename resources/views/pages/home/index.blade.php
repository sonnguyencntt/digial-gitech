@extends('layouts.app')
@section('content')
<main id="main" class="">


    <div id="content" role="main" class="content-area">


        <div class="row row-large row-full-width sildehome" id="row-299080424">

            <div id="col-362824995" class="col small-12 large-12">
                <div class="col-inner dark" style="max-width:2048px;">


                    <div id="metaslider-id-14" style="width: 100%;"
                        class="ml-slider-3-23-3 metaslider metaslider-flex metaslider-14 ml-slider nav-hidden">
                        <div id="metaslider_container_14">
                            <div id="metaslider_14">
                                <ul aria-live="polite" class="slides">
                                    <li style="display: block; width: 100%;" class="slide-18 ms-image"><a
                                            href="#" target="_self"><img
                                                src="wp-content/uploads/sites/37/2021/06/banner-3.jpg"
                                                height="635" width="2048" alt="" class="slider-14 slide-18"
                                                title="banner-3" /></a></li>
                                    <li style="display: none; width: 100%;" class="slide-19 ms-image"><a
                                            href="#" target="_self"><img
                                                src="wp-content/uploads/sites/37/2021/06/banner-2.png"
                                                height="635" width="2048" alt="" class="slider-14 slide-19"
                                                title="banner-2" /></a></li>
                                    <li style="display: none; width: 100%;" class="slide-20 ms-image"><a
                                            href="#" target="_self"><img
                                                src="wp-content/uploads/sites/37/2021/06/banner1-2048x635.png"
                                                height="635" width="2048" alt="" class="slider-14 slide-20"
                                                title="banner1" /></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div id="gap-464267263" class="gap-element clearfix" style="display:block; height:auto;">

            <style>
                #gap-464267263 {
                    padding-top: 30px;
                }
            </style>
        </div>
        @foreach ($listProduct as $list )
            
       
        <div class="row" id="row-1687466452">

            <div id="col-1260718203" class="col small-12 large-12" >
                <div class="col-inner">


                    <div class="container section-title-container">
                        <h3 class="section-title section-title-normal"><b></b><span
                                class="section-title-main">{{$list->name}}</span><b></b></h3>
                    </div>
                    <div id="gap-459636481" class="gap-element clearfix" style="display:block; height:auto;">

                        <style>
                            #gap-459636481 {
                                padding-top: 20px;
                            }
                        </style>
                    </div>

                    <ul class="goi_cuoc_home">
                        @foreach($list->internet as $combo)
                        <li class="col_li-3 internet-ca-nhan">
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
                            <div class="bt_dangky"><a data-toggle="modal" data-target="#bookingModal"
                                    class="dangkyngay-bt">ĐĂNG KÝ NGAY</a></div>
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
                </div>
            </div>


        </div>

        @endforeach


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
                                                src="../kia-daklak.com.vn/wp-content/uploads/sites/37/2021/06/fpt-camera-ngoai-troi-300x290.html"
                                                alt="" width="300" height="290"
                                                srcset="https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/fpt-camera-ngoai-troi-300x290.png 300w, https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/fpt-camera-ngoai-troi.png 558w"
                                                sizes="(max-width: 300px) 100vw, 300px" /></div>
                                        <div class="text-content">
                                            {!!$camera->description!!}
                                            <div class="giasp">
                                                <div class="gia-left"><span
                                                        style="color: #898888; text-decoration: line-through; font-family: 'UTM Avo'; font-size: 15px;"><strong>{{$camera->price}}
                                                            vnđ</strong></span></div>
                                                <div class="gia-right"><span
                                                        style="color: #f26522;"><strong>{{$camera->discount}}
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
                                        <div class="chitietbt"><a href="{{route('service_camera.index')}}">Xem chi tiết</a>
                                        </div>
                                        <div class="dangkybt"><a class="dangkyngay-bt" href="#">ĐĂNG KÝ NGAY</a>
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
        <div class="row khuyenmai-home" id="row-2021042945">

            <div id="col-1236074974" class="col small-12 large-12" >
                <div class="col-inner">



                    <div class="tabbed-content tabtintuc-home tintuckhuyenmai">
                        <h4 class="uppercase text-left">Tab Title</h4>
                        <ul class="nav nav-line nav-uppercase nav-size-normal nav-left">
                            
                            <li class="tab has-icon"><a href="{{route('posts.index')}}"><span>TIN TỨC</span></a></li>
                        </ul>
                        <div class="tab-panels">
                            <div class="panel active entry-content" id="tab_khuyẾn-mÃi">
                                <div id="gap-1596481980" class="gap-element clearfix"
                                    style="display:block; height:auto;">

                                    <style>
                                        #gap-1596481980 {
                                            padding-top: 17px;
                                        }
                                    </style>
                                </div>



                                <div class="row large-columns-3 medium-columns-1 small-columns-1 slider row-slider slider-nav-circle slider-nav-push"
                                    data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : 5000}'>
                                @foreach ($listPosts as $posts)
                                    
                                
                                    <div class="col post-item">
                                        <div class="col-inner">
                                            <a href="{{ route('posts.show',$posts->id)}}"
                                                class="plain">
                                                <div
                                                    class="box box-default box-text-bottom box-blog-post has-hover">
                                                    <div class="box-image">
                                                        <div class="image-cover" style="padding-top:56.25%;">
                                                            <img width="1020" height="567"
                                                                src="wp-content/uploads/sites/37/2021/06/box-1024x569.jpg"
                                                                class="attachment-large size-large wp-post-image"
                                                                alt="" loading="lazy"
                                                                srcset="{{$posts->image_url}} 1024w, {{$posts->image_url}} 300w, {{$posts->image_url}} 768w, {{$posts->image_url}} 1200w"
                                                                sizes="(max-width: 1020px) 100vw, 1020px" />
                                                        </div>
                                                    </div>
                                                    <div class="box-text text-left">
                                                        <div class="box-text-inner blog-post-inner">


                                                            <h5 class="post-title is-large ">{{str_limit($posts->title, $limit = 100, $end = '[...]')}}</h5>
                                                            <div class="post-meta is-small op-8">{{$posts->created_at->format('d/m/Y')}}</div>
                                                            <div class="is-divider"></div>
                                                            <p class="from_the_blog_excerpt ">	{!! str_limit($posts->description, $limit = 100, $end = '[...]') !!} </p>



                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                   
                                    @endforeach
                                   
                                </div>
                            </div>
                            <div class="panel entry-content" id="tab_tin-tỨc">


                                <div class="row large-columns-3 medium-columns-1 small-columns-1 slider row-slider slider-nav-circle slider-nav-push"
                                    data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : 5000}'>

                                    <div class="col post-item">
                                        <div class="col-inner">
                                            <a href="blog/khung-hoang-dang-trao-o-manchester-united/index.html"
                                                class="plain">
                                                <div
                                                    class="box box-default box-text-bottom box-blog-post has-hover">
                                                    <div class="box-image">
                                                        <div class="image-cover" style="padding-top:56.25%;">
                                                            <img width="512" height="317"
                                                                src="wp-content/uploads/sites/37/2021/10/1.png"
                                                                class="attachment-large size-large wp-post-image"
                                                                alt="" loading="lazy"
                                                                srcset="https://fptvienthong.net/wp-content/uploads/sites/37/2021/10/1.png 512w, https://fptvienthong.net/wp-content/uploads/sites/37/2021/10/1-300x186.png 300w"
                                                                sizes="(max-width: 512px) 100vw, 512px" />
                                                        </div>
                                                    </div>
                                                    <div class="box-text text-left">
                                                        <div class="box-text-inner blog-post-inner">


                                                            <h5 class="post-title is-large ">Khủng hoảng “dâng
                                                                trào” ở Manchester United</h5>
                                                            <div class="post-meta is-small op-8">21 Tháng Mười,
                                                                2021</div>
                                                            <div class="is-divider"></div>
                                                            <p class="from_the_blog_excerpt ">Mối quan hệ giữa
                                                                HLV Ole Gunnar Solskjaer với các học trò và CĐV
                                                                của M.U liên tục gặp thêm nhiều [...] </p>



                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col post-item">
                                        <div class="col-inner">
                                            <a href="blog/fpt-nam-thu-9-doc-chiem-linh-vuc-cong-nghe-trong-danh-sach-top-50-cua-forbes/index.html"
                                                class="plain">
                                                <div
                                                    class="box box-default box-text-bottom box-blog-post has-hover">
                                                    <div class="box-image">
                                                        <div class="image-cover" style="padding-top:56.25%;">
                                                            <img width="640" height="284"
                                                                src="wp-content/uploads/sites/37/2021/06/Screen-Shot-2021-06-07-at-14-2-7567-3096-1623052049.png"
                                                                class="attachment-large size-large wp-post-image"
                                                                alt="" loading="lazy"
                                                                srcset="https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/Screen-Shot-2021-06-07-at-14-2-7567-3096-1623052049.png 640w, https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/Screen-Shot-2021-06-07-at-14-2-7567-3096-1623052049-300x133.png 300w"
                                                                sizes="(max-width: 640px) 100vw, 640px" />
                                                        </div>
                                                    </div>
                                                    <div class="box-text text-left">
                                                        <div class="box-text-inner blog-post-inner">


                                                            <h5 class="post-title is-large ">FPT năm thứ 9 độc
                                                                chiếm lĩnh vực công nghệ trong danh sách Top 50
                                                                của Forbes</h5>
                                                            <div class="post-meta is-small op-8">15 Tháng Sáu,
                                                                2021</div>
                                                            <div class="is-divider"></div>
                                                            <p class="from_the_blog_excerpt ">Hôm nay (ngày
                                                                7/6), Forbes Việt Nam công bố “Danh sách 50
                                                                công ty niêm yết tốt nhất” Việt Nam năm [...]
                                                            </p>



                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col post-item">
                                        <div class="col-inner">
                                            <a href="blog/fpt-telecom-tang-gap-doi-bang-thong-mien-phi-cho-toan-bo-khach-hang/index.html"
                                                class="plain">
                                                <div
                                                    class="box box-default box-text-bottom box-blog-post has-hover">
                                                    <div class="box-image">
                                                        <div class="image-cover" style="padding-top:56.25%;">
                                                            <img width="700" height="410"
                                                                src="wp-content/uploads/sites/37/2021/06/thumb-3755-1620867166.jpg"
                                                                class="attachment-large size-large wp-post-image"
                                                                alt="" loading="lazy"
                                                                srcset="https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/thumb-3755-1620867166.jpg 700w, https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/thumb-3755-1620867166-300x176.jpg 300w"
                                                                sizes="(max-width: 700px) 100vw, 700px" />
                                                        </div>
                                                    </div>
                                                    <div class="box-text text-left">
                                                        <div class="box-text-inner blog-post-inner">


                                                            <h5 class="post-title is-large ">FPT Telecom tăng
                                                                gấp đôi băng thông miễn phí cho toàn bộ khách
                                                                hàng</h5>
                                                            <div class="post-meta is-small op-8">15 Tháng Sáu,
                                                                2021</div>
                                                            <div class="is-divider"></div>
                                                            <p class="from_the_blog_excerpt ">Toàn bộ khách hàng
                                                                sử dụng dịch vụ Internet FPT sẽ được nâng cấp
                                                                gấp đôi băng thông mà không mất [...] </p>



                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col post-item">
                                        <div class="col-inner">
                                            <a href="blog/lan-cuoi-cung-chay-cung-running-man-hoang-tu-chau-a-lee-kwang-soo-khep-lai-hanh-trinh-11-nam-cong-hien/index.html"
                                                class="plain">
                                                <div
                                                    class="box box-default box-text-bottom box-blog-post has-hover">
                                                    <div class="box-image">
                                                        <div class="image-cover" style="padding-top:56.25%;">
                                                            <img width="660" height="495"
                                                                src="wp-content/uploads/sites/37/2021/06/tintuc-2.png"
                                                                class="attachment-large size-large wp-post-image"
                                                                alt="" loading="lazy"
                                                                srcset="https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/tintuc-2.png 660w, https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/tintuc-2-300x225.png 300w"
                                                                sizes="(max-width: 660px) 100vw, 660px" />
                                                        </div>
                                                    </div>
                                                    <div class="box-text text-left">
                                                        <div class="box-text-inner blog-post-inner">


                                                            <h5 class="post-title is-large ">Lần cuối cùng
                                                                &#8220;chạy&#8221; cùng Running Man,
                                                                &#8220;Hoàng tử Châu Á&#8221; Lee Kwang Soo khép
                                                                lại hành trình 11 năm cống hiến</h5>
                                                            <div class="post-meta is-small op-8">15 Tháng Sáu,
                                                                2021</div>
                                                            <div class="is-divider"></div>
                                                            <p class="from_the_blog_excerpt ">Không chỉ là những
                                                                hình ảnh cuối cùng, tập 559 Running Man còn
                                                                chiếu lại những khoảnh khắc đầu tiên Lee [...]
                                                            </p>



                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col post-item">
                                        <div class="col-inner">
                                            <a href="blog/don-tuan-moi-cung-loat-phim-dac-sac-cho-tre-tren-ung-dung-foxy-cua-truyen-hinh-fpt/index.html"
                                                class="plain">
                                                <div
                                                    class="box box-default box-text-bottom box-blog-post has-hover">
                                                    <div class="box-image">
                                                        <div class="image-cover" style="padding-top:56.25%;">
                                                            <img width="1000" height="666"
                                                                src="wp-content/uploads/sites/37/2021/06/1-255.jpg"
                                                                class="attachment-large size-large wp-post-image"
                                                                alt="" loading="lazy"
                                                                srcset="https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/1-255.jpg 1000w, https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/1-255-300x200.jpg 300w, https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/1-255-768x511.jpg 768w"
                                                                sizes="(max-width: 1000px) 100vw, 1000px" />
                                                        </div>
                                                    </div>
                                                    <div class="box-text text-left">
                                                        <div class="box-text-inner blog-post-inner">


                                                            <h5 class="post-title is-large ">Đón tuần mới cùng
                                                                loạt phim đặc sắc cho trẻ trên ứng dụng Foxy của
                                                                Truyền hình FPT</h5>
                                                            <div class="post-meta is-small op-8">15 Tháng Sáu,
                                                                2021</div>
                                                            <div class="is-divider"></div>
                                                            <p class="from_the_blog_excerpt ">Lời Thề Dưới
                                                                Tuyết, Cô Phù Thủy Nhỏ và Asterix Thông
                                                                Minh&#8230;. là 3 bộ phim đang được các bạn nhỏ
                                                                [...] </p>



                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col post-item">
                                        <div class="col-inner">
                                            <a href="blog/loi-ich-cua-viec-tap-luyen-giup-tang-suc-de-khang-bao-ve-ban-than-khoi-dich-covid/index.html"
                                                class="plain">
                                                <div
                                                    class="box box-default box-text-bottom box-blog-post has-hover">
                                                    <div class="box-image">
                                                        <div class="image-cover" style="padding-top:56.25%;">
                                                            <img width="1020" height="582"
                                                                src="wp-content/uploads/sites/37/2021/06/tintuc1-1024x584.png"
                                                                class="attachment-large size-large wp-post-image"
                                                                alt="" loading="lazy"
                                                                srcset="https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/tintuc1-1024x584.png 1024w, https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/tintuc1-300x171.png 300w, https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/tintuc1-768x438.png 768w, https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/tintuc1-1536x876.png 1536w, https://fptvienthong.net/wp-content/uploads/sites/37/2021/06/tintuc1.png 1600w"
                                                                sizes="(max-width: 1020px) 100vw, 1020px" />
                                                        </div>
                                                    </div>
                                                    <div class="box-text text-left">
                                                        <div class="box-text-inner blog-post-inner">


                                                            <h5 class="post-title is-large ">Lợi ích của việc
                                                                tập luyện giúp tăng sức đề kháng, bảo vệ bản
                                                                thân khỏi dịch COVID</h5>
                                                            <div class="post-meta is-small op-8">15 Tháng Sáu,
                                                                2021</div>
                                                            <div class="is-divider"></div>
                                                            <p class="from_the_blog_excerpt ">Một trong những
                                                                lợi ích chính của việc tập luyện thể dục thể
                                                                thao tại nhà là giúp ngăn ngừa được [...] </p>



                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>



</main>
@stop