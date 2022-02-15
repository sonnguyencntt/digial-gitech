<div class="row row-large row-full-width sildehome" id="row-299080424">

    <div id="col-362824995" class="col small-12 large-12">

       


        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach($listBanner as $banner)
                <div class="swiper-slide">
                <img class="img-banner" src="{{$banner->image_url}}" height="635" width="2048" alt=""
                    class="slider-14 slide-18" title="banner-3" />
                </div>

                @endforeach

            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>









    </div>


</div>

@section('css')
<style>
    .swiper-container {}
</style>
@stop

@section('javascript')
<script>
 var mySwiper = new Swiper('.swiper-container', {
      // Optional parameters
      loop: true,
      centeredSlides: true,
      slidesPerView: 1,

      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      }
  })
  </script>


@endsection