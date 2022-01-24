<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 704px;">
        <section class="sidebar" style="height: 704px; overflow: auto; width: auto;">



            <ul class="sidebar-menu tree" data-widget="tree">
                <?php
    $store_code = isset(\request()->store_code) ? \request()->store_code : null;
?>
                @if($store_code !== null)
                @foreach(\menu(null , null , $store_code) as $key => $value)
                @if($value['sub_menu'] == false)
                <li id="1" class="">
                    <a href="{{ $value['url'] }}">
                        <i class="{{ $value['icon'] }}"></i> <span>{{ $value['name'] }}</span>
                    </a>
                </li>

                @else
                <li class="treeview " id="userMainNav">
                    <a href="#">
                        <i class="{{ $value['icon'] }}"></i>
                        <span>{{ $value['name'] }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @foreach($value['list_sub_menu'] as $key => $_value)
                        <li id="createUserSubNav"><a href="{{ $_value['url'] }}"><i class="fa fa-circle-o"></i>{{
                                $_value['name'] }}</a></li>
                        @endforeach


                    </ul>
                </li>
                @endif
                @endforeach
                @else
                <li id="1" class="">

                    <a href="{{route("manage.home.show_stores")}}">
                        <i class="fa fa-home"></i> <span>Cửa hàng</span>
                    </a>

                </li>
                <li id="1" class="">

                    <a href="{{route("manage.profile.index")}}">
                        <i class="fa fa-user"></i> <span>Thông tin</span>
                    </a>

                </li>
                @endif
                <li id="1" class="">

                    <a onclick="$('#form_logout').submit();">
                        <i class="fa fa-sign-out"></i> <span>Đăng xuất</span>
                    </a>

                </li>
             

                <form id="form_logout" method="post" action="{{route("manage.logout")}}">
                    @csrf

                </form>



            </ul>
        </section>
        <div class="slimScrollBar"
            style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 510.944px;">
        </div>
        <div class="slimScrollRail"
            style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
        </div>
    </div>
    <!-- /.sidebar -->
</aside>