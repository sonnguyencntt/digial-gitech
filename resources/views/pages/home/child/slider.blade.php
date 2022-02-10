<div class="row row-large row-full-width sildehome" id="row-299080424">

    <div id="col-362824995" class="col small-12 large-12">
        <div class="col-inner dark" style="max-width:2048px;">


            <div id="metaslider-id-14" style="width: 100%;"
                class="ml-slider-3-23-3 metaslider metaslider-flex metaslider-14 ml-slider nav-hidden">
                <div id="metaslider_container_14">
                    <div id="metaslider_14">
                        <ul aria-live="polite" class="slides">
                            @foreach($listBanner as  $banner)
                                
                            <li style="display: block; width: 100%;" class="slide-18 ms-image"><a
                                    href="#" target="_self"><img class="img-banner"
                                        src="{{$banner->image_url}}"
                                        height="635" width="2048" alt="" class="slider-14 slide-18"
                                        title="banner-3" /></a></li>
                                        @endforeach

                           
                           
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>