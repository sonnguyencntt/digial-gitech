<div class="hotline-phone-ring-wrap">
    <div class="hotline-phone-ring">
        <div class="hotline-phone-ring-circle"></div>
        <div class="hotline-phone-ring-circle-fill"></div>
        <div class="hotline-phone-ring-img-circle">
            <a href="tel:0901793997" class="pps-btn-img occall">
                <img src="{{asset('assets/image/iconcall.png')}}"
                    alt="Gọi điện thoại" width="50">
            </a>
        </div>

    </div>
    <div class="hotline-bar">
        <a href="tel:0901793997">
            <span class="text-hotline">
                {{$themeView->hotline}}
           </span>
        </a>
    </div>
</div>
<div class="zalo-container" style="bottom:185px;">
    <a id="zalo-btn oczalo" href="{{'https://zalo.me/'."".$themeView->id_zalo}}" target="_blank" rel="noopener noreferrer nofollow">
        <div class="animated_zalo infinite zoomIn_zalo cmoz-alo-circle"></div>
        <div class="animated_zalo infinite pulse_zalo cmoz-alo-circle-fill"></div>
        <span><img src="{{asset('images/zalo.png')}}"
                alt="Contact Me on Zalo"></span>
    </a>
</div>