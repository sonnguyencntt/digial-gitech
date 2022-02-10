<div class="col-inner">
    <a href="{{ route('posts.show',["store_code" =>  $badges->store_code,"post"=>$posts->id])}}"
        class="plain">
        <div
            class="box box-default box-text-bottom box-blog-post has-hover">
            <div class="box-image">
                <div class="image-cover" style="padding-top:56.25%;">
                    <img width="1020" height="567"
                        src="{{$posts->image_url}}"
                        class="attachment-large size-large wp-post-image"
                     />
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