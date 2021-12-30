<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 704px;">
        <section class="sidebar" style="height: 704px; overflow: auto; width: auto;">
      <!-- Sidebar user panel -->

      <!-- search form -->
    
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree" >
        <li id="1" class="">
            <a href="{{ ('manage.dashboard.index') }}">
                <i class="fa fa-dashboard"></i> <span>Bảng điều khiển</span>
            </a>
        </li>
        <li id="1" class="">
            <a href="{{ ('manage.contact.index') }}">
                <i class="fa fa-dashboard"></i> <span>Danh sách tư vấn</span>
            </a>
        </li>
        <li id="1" class="">
            <a href="{{ ('manage.category.index') }}">
                <i class="fa fa-dashboard"></i>               
                  <span>Danh mục</span>

            </a>
        </li>
     
        <li class="treeview " id="userMainNav">
            <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Bài viết</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li id="createUserSubNav" class=" "><a href="{{ ('manage.blog.index') }}"><i
                            class="fa fa-circle-o"></i>Danh sách</a></li>
                <li id="createUserSubNav" class=" "><a href="{{ ('manage.blog.create') }}"><i
                            class="fa fa-circle-o"></i>Thêm mới</a></li>
            </ul>
        </li>
        <li id="1" class="">
            <a href="{{ ('manage.profile.index') }}">
                <i class="fa fa-dashboard"></i> <span>Hồ sơ</span>
            </a>
        </li>
            {{-------------------------------Quản lý danh sách----------------------------------}}

       
   
      
        {{-- <li class="treeview " id="userMainNav">
            <a href="#">
                <i class="fa fa-files-o"></i>
                <span> Đầu máy</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li id="createUserSubNav" class=" "><a href="{{ ('equipment.index') }}"><i
                            class="fa fa-circle-o"></i>Danh sách</a></li>
                <li id="createUserSubNav" class=" "><a href="{{ ('equipment.create') }}"><i
                            class="fa fa-circle-o"></i>Thêm mới</a></li>
            </ul>
        </li> --}}
   

        <li id="1" class="">
            <a href="{{ ('manage.auth.logout') }}">
                <i class="glyphicon glyphicon-log-out"></i> <span>Đăng xuất</span>
            </a>
        </li>
    </section><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 510.944px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
    <!-- /.sidebar -->
  </aside>