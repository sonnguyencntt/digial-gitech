<header id="header" class="header has-sticky sticky-jump">
    <div class="header-wrapper">
        <div id="top-bar" class="header-top hide-for-sticky nav-dark">
            <div class="flex-row container">
                <div class="flex-col hide-for-medium flex-left">
                    <ul class="nav nav-left medium-nav-center nav-small  nav-divided">
                        <li class="html custom html_topbar_left">Hotline: <a href="tel:0901793997">
                                {{$themeView->hotline}}
                            </a></li>
                    </ul>
                </div>

                <div class="flex-col hide-for-medium flex-center">
                    <ul class="nav nav-center nav-small  nav-divided">
                    </ul>
                </div>

                <div class="flex-col hide-for-medium flex-right">
                    <ul class="nav top-bar-nav nav-right nav-small  nav-divided">
                        {{-- <li id="menu-item-105"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-21 current_page_item menu-item-has-children menu-item-105 active menu-item-design-default has-dropdown">
                            <a href="index.html" aria-current="page" class="nav-top-link">Trang chủ<i
                                    class="icon-angle-down"></i></a>
                            <ul class="sub-menu nav-dropdown nav-dropdown-default">
                                <li id="menu-item-352"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-352">
                                    <a href="trang-chu-2/index.html">Trang chủ 2</a>
                                </li>
                            </ul>
                        </li> --}}
                        {{-- <li id="menu-item-102"
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-102 menu-item-design-default">
                            <a href="blog/danh-muc/khuyen-mai/index.html" class="nav-top-link">Khuyến mãi</a>
                        </li> --}}
                        <li id="menu-item-103"
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-103 menu-item-design-default">
                            <a href="{{route('posts.index' , $badges->domain)}}" class="nav-top-link">Tin tức</a>
                        </li>
                        <li id="menu-item-104"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-104 menu-item-design-default">
                            <a href="{{route('contact.index' , $badges->domain)}}" class="nav-top-link">Liên hệ</a>
                        </li>
                    </ul>
                </div>

                <div class="flex-col show-for-medium flex-grow">
                    <ul class="nav nav-center nav-small mobile-nav  nav-divided">
                        <li class="html custom html_topbar_left">Hotline: <a href="tel:0901793997">
                                {{$themeView->hotline}}
                            </a></li>
                    </ul>
                </div>

            </div>
        </div>
        <div id="masthead" class="header-main ">
            <div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">

                <!-- Logo -->
                <div id="logo" class="flex-col logo">
                    <!-- Header logo -->
                    <a href="{{route('home.index', $badges->domain)}}"
                        title="fptvienthong.net - Công ty Cổ phần Viễn thông FPT" rel="home">
                        <img style="max-height: 90px" width="200" height="90" src="{{$themeView->logo}}" class="header_logo header-logo"
                            alt="fptvienthong.net" />
                </div>

                <!-- Mobile Left Elements -->
                <div class="flex-col show-for-medium flex-left">
                    <ul class="mobile-nav nav nav-left ">
                        <li class="nav-icon has-icon">
                            <a href="#" data-open="#main-menu" data-pos="left" data-bg="main-menu-overlay" data-color=""
                                class="is-small" aria-label="Menu" aria-controls="main-menu" aria-expanded="false">

                                <i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Left Elements -->
                <div class="flex-col hide-for-medium flex-left
    flex-grow">
                    <ul class="header-nav header-nav-main nav nav-left  nav-uppercase">
                    </ul>
                </div>

                <!-- Right Elements -->
                <div class="flex-col hide-for-medium flex-right">
                    <ul class="header-nav header-nav-main nav nav-right  nav-uppercase">
                        @foreach ($listCategories as $category)


                        <li id="menu-item-100"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-100 menu-item-design-default">
                            <a href="{{asset($category->link_url."".$category->id)}}"
                                class="nav-top-link">{{$category->name}}</a>
                        </li>
                        @endforeach

                    </ul>
                </div>

                <!-- Mobile Right Elements -->
                <div class="flex-col show-for-medium flex-right">
                    <ul class="mobile-nav nav nav-right ">
                    </ul>
                </div>

            </div>

            <div class="container">
                <div class="top-divider full-width"></div>
            </div>
        </div>
        <div class="header-bg-container fill">
            <div class="header-bg-image fill"></div>
            <div class="header-bg-color fill"></div>
        </div>
    </div>
</header>