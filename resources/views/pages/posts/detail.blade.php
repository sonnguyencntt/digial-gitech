@extends('layouts.app')
@section('content')

	
<main id="main" class="">

    <div id="content" class="blog-wrapper blog-single page-wrapper">
        
    <div class="row row-large ">
    
        <div class="post-sidebar large-3 col">
            <div class="is-sticky-column"><div class="is-sticky-column__inner">		<div id="secondary" class="widget-area " role="complementary">
            
            <aside id="recent-posts-2" class="widget widget_recent_entries">
            <h3 class="widget-title "><span>Tin tức mới</span></h3><div class="is-divider small"></div>
            <ul>
                @foreach ($listPosts as $list )
                    <li>
                        <a href="{{ route('posts.show',["domain" =>  $list->domain,"post"=>$list->id])}}">{{$list->title}}</a>
                    </li>
                @endforeach
                 
                        </ul>
    
            </aside></div>
            </div></div>	</div>
    
        <div class="large-9 col medium-col-first">
            
    
    
    <article id="post-129" class="post-129 post type-post status-publish format-standard has-post-thumbnail hentry category-tin-tuc">
        <div class="article-inner ">
            <header class="entry-header">
        <div class="entry-header-text entry-header-text-top text-left">
            
    <h1 class="entry-title">{{$detail->title}}</h1>
    <div class="entry-divider is-divider small"></div>
    
        <div class="entry-meta uppercase is-xsmall">
            <span class="posted-on">Đăng ngày <a  rel="bookmark"><time class="entry-date published" datetime="2021-06-15T02:21:39+00:00">{{$detail->created_at->format('d/m/Y')}}</time><time class="updated" datetime="2021-06-15T02:22:13+00:00">15 Tháng Sáu, 2021</time></a></span></span>	</div>
        </div>
                    </header>
    <div class="entry-content single-page">
        {!!$detail->description!!};
    </div>
     
    
    </div>
    </article>
    
    
        </div>
    
    </div>
    
    </div>
    
    
    </main>
    @stop