@if($themeView)
<footer id="footer" class="footer-wrapper">


    <!-- FOOTER 1 -->
    <div class="footer-widgets footer footer-1">
        <div class="row large-columns-4 mb-0">
            <div id="text-2" class="col pb-0 widget widget_text"><span class="widget-title">Thông tin liên
                    hệ</span>
                <div class="is-divider small"></div>
                    
                
                <div class="textwidget">
                    <p><strong><span class="text-f37021">Địa chỉ:</span></strong> <a
                            href="https://www.google.com/maps/place/FPT+Telecom/@10.7602159,106.7379094,16z/data=!4m8!1m2!2m1!1zTMO0IDM3LTM5QSwgxJHGsOG7nW5nIDE5LCBLQ1ggVMOibiBUaHXhuq1uLCBQaMaw4budbmcgVMOibiBUaHXhuq1uIMSQw7RuZywgUXXhuq1uIDc!3m4!1s0x317525ea5fc1b879:0x2f8d8851ef4a585a!8m2!3d10.766092!4d106.743751"
                            target="_blank" rel="noreferrer noopener">{{$themeView->address}}</a></p>
                    <p><strong>Hotline: <a href="tel:0901793997">{{$themeView->hotline}}</a></strong></p>
                    <p><strong>Email:</strong>{{$themeView->email}}</p>
                </div>
            </div>
            <div id="nav_menu-2" class="col pb-0 widget widget_nav_menu"><span class="widget-title">Sản phẩm
                    &#8211; Dịch vụ</span>
                <div class="is-divider small"></div>
                <div class="menu-san-pham-dich-vu-container">
                    <ul id="menu-san-pham-dich-vu" class="menu">
                        @foreach ($listCategories as $category )
                            
                       
                        <li id="menu-item-90"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-90"><a
                                href="{{asset($category->link_url."".$category->id)}}">{{$category->name}}</a></li>
                        @endforeach 
                    </ul>
                </div>
            </div>
            <div id="nav_menu-3" class="col pb-0 widget widget_nav_menu"><span class="widget-title">Về chúng
                    tôi</span>
                <div class="is-divider small"></div>
                <div class="menu-ve-chung-toi-container">
                    <ul id="menu-ve-chung-toi" class="menu">
                        @if($themeView->post_id_privacy_policy)
                        <li id="menu-item-91"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-privacy-policy menu-item-91">
                        <a href="{{ route('posts.show',["domain"=>$badges->domain , "post" => $themeView->post_id_privacy_policy])}}">Chính sách bảo mật</a></li>
                  
                        @endif

                        @if($themeView->post_id_payment_policy)
                        <li id="menu-item-92"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-92"><a
                            href="{{ route('posts.show',["domain"=>$badges->domain ,'post' => $themeView->post_id_payment_policy])}}">Chính sách thanh toán</a></li>
                        @endif
                      
                            
                        @if($themeView->post_id_website_terms_of_use)
                        <li id="menu-item-93"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-93"><a
                            href="{{ route('posts.show',["domain"=>$badges->domain ,'post' =>$themeView->post_id_website_terms_of_use])}}">Điều khoản sử dụng website</a></li>
                        @endif
                     
                        <li id="menu-item-94"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-94"><a
                                href="{{ route('contact.index' , $badges->domain)}}">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
            <div id="text-3" class="col pb-0 widget widget_text"><span class="widget-title">Kết nối với chúng
                    tôi</span>
                <div class="is-divider small"></div>
                
                    
                
                <div class="textwidget">
                    <ul class="fptft">
                        @if ($themeView->show_icon_zalo )
                        
                            <li><a href={{'https://zalo.me/'."".$themeView->id_zalo}} target="_blank" rel="noopener"><img
                            loading="lazy" class="alignnone size-full wp-image-65"
                            src="{{asset('assets/image/footer/zalo.png')}}" alt="" width="39"
                            height="39" /></a></li>
                        @endif
                        @if( $themeView->show_icon_facebook)
                       
                        
                            <li><a href={{'https://www.facebook.com/'."".$themeView->id_facebook}} target="_blank" rel="noopener"><img
                            loading="lazy" class="alignnone size-medium wp-image-66"
                            src="{{asset('assets/image/footer/face.png')}}" alt="" width="39"
                            height="39" /></a></li>
                        @endif
                        @if( $themeView->show_icon_youtube)
                       
                        
                        <li><a href={{'https://www.youtube.com/channel/'."".$themeView->id_youtobe}} target="_blank"
                                rel="noopener"><img loading="lazy" class="alignnone size-medium wp-image-68"
                                    src="{{asset('assets/image/footer/youtube.png')}}" alt="" width="39"
                                    height="39" /></a></li>
                        @endif
                    </ul>
                    <p><a href="http://online.gov.vn/Home/WebDetails/35561"><img loading="lazy"
                                class="alignnone size-full wp-image-95"
                                src="{{asset('assets/image/footer/dathongbao.png')}}" alt="" width="160"
                                height="61" /></a><br />
                        {{-- <a href="http://www.dmca.com/Protection/Status.aspx?ID=d6c9a045-e968-4399-a25a-d09775aebb41"
                            title="DMCA.com Protection Status" class="dmca-badge"> <img
                                src="../images.dmca.com/Badges/dmca_protected_sml_120mc635.png?ID=d6c9a045-e968-4399-a25a-d09775aebb41"
                                alt="DMCA.com Protection Status" /></a> --}}
                    </p>
                </div>
               

            </div>
        </div>
    </div>

    <!-- FOOTER 2 -->



    <div class="absolute-footer dark medium-text-center small-text-center">
        <div class="container clearfix">


            <div class="footer-primary pull-left">
                <div class="copyright-footer">
                    Copyright 2021 © <strong>Fptmiennam.vn {{\env('APP_ENV')}}</strong> </div>
            </div>
        </div>
    </div>
    <a href="#top"
        class="back-to-top button icon invert plain fixed bottom z-1 is-outline hide-for-medium circle"
        id="top-link"><i class="icon-angle-up"></i></a>

</footer>
@endif
