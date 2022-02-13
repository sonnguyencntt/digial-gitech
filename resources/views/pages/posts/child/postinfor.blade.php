<div class="row align-center">
    <div class="large-12 col">
    
    

    
  
    <div class="row large-columns-3 medium-columns- small-columns-1">
        @foreach($list as $itemList)
          <div class="col post-item" >
            <div class="col-inner">
            <a href="{{ route('posts.show',["store_code" =>  $itemList->store_code,"post"=>$itemList->id])}}" class="plain">
                <div class="box box-text-bottom box-blog-post has-hover">
                                <div class="box-image" >
                          <div class="image-cover" style="padding-top:56%;">
                              <img width="300" height="186" src={{$itemList->image_url}} class="attachment-medium size-medium wp-post-image" alt="" loading="lazy" srcset="{{$itemList->image_url}} 300w, {{$itemList->image_url}} 512w" sizes="(max-width: 300px) 100vw, 300px" />  							  							  						</div>
                                                </div>
                              <div class="box-text text-left" >
                    <div class="box-text-inner blog-post-inner">
                                        <h5 class="post-title is-large ">{{$itemList->title}}</h5>
                                        <div class="is-divider"></div>
                                        <p class="from_the_blog_excerpt ">	{!! str_limit($itemList->description, $limit = 100, $end = '...') !!}		</p>
                    </div>
                    </div>
                                    </div>
                </a>
            </div>
        </div>
        @endforeach
        

</div>