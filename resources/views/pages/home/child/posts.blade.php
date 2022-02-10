<div class="row khuyenmai-home" id="row-2021042945">

    <div id="col-1236074974" class="col small-12 large-12" >
        <div class="col-inner">



            <div class="tabbed-content tabtintuc-home tintuckhuyenmai">
                <ul class="nav nav-line nav-uppercase nav-size-normal nav-left">
                    
                    <li class="tab has-icon"><a href="{{route('posts.index', $badges->store_code)}}"><span>TIN TỨC</span></a></li>
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
                                @include('components.item_posts');

                            </div>
                           
                            @endforeach
                           
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>


</div>