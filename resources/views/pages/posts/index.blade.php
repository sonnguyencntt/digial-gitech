@extends('layouts.app')
@section('content')

<main id="main" class="">

    <div id="content" class="blog-wrapper blog-archive page-wrapper">
            <header class="archive-page-header">
        <div class="row">
        <div class="large-12 text-center col">
        <h1 class="page-title is-large uppercase">
            <span>Tin tức</span>	</h1>
            </div>
        </div>
    </header>
    
{{-- thông tin tất cả các posts --}}
@includeWhen(count($list) > 0, 'pages.posts.child.postinfor' )
        </div>
    
    </div>
    
    </div>
    
    
    </main>

    @stop