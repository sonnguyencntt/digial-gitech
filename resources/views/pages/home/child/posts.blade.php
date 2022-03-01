<div class="row khuyenmai-home" id="row-2021042945">

    <div id="col-1236074974" class="col small-12 large-12" >
        <div class="col-inner">



            <div class="tabbed-content tabtintuc-home tintuckhuyenmai">
                <ul class="nav nav-line nav-uppercase nav-size-normal nav-left">
                    
                    <li class="tab has-icon"><a href="{{route('posts.index', $badges->domain)}}"><span>TIN TỨC</span></a></li>
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
                            >

                            <div class="swiper-container swiper-posts">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    @foreach ($listPosts as $posts)
                                    <div class="swiper-slide">
                                        <div class="col post-item">
                                            @include('components.item_posts');
            
                                        </div>
                                    </div>
                    
                                    @endforeach
                    
                                </div>
                                <!-- If we need pagination -->
                                <div class="swiper-pagination swiper-pagination-posts"></div>
                    
                                <!-- If we need navigation buttons -->
                                <div class="swiper-button-prev swiper-button-prev-posts"></div>
                                <div class="swiper-button-next swiper-button-next-posts"></div>
                    
                                <!-- If we need scrollbar -->
                                {{-- <div class="swiper-scrollbar"></div> --}}
                            </div>
                   
                           
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>


</div>

@section('javascript')
<script>
 var postsSwiper = new Swiper('.swiper-posts', {
      // Optional parameters
      loop: true,
      centeredSlides: true,
      slidesPerView: 3,

      pagination: {
        el: '.swiper-pagination-posts',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next-posts',
        prevEl: '.swiper-button-prev-posts',
      }
  })
  </script>
@parent

@endsection