
<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">  <img style="width:45px" src={{asset("assets/image/admin.png")}} alt="">
    </span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"> <img style="width: 37px;
      padding: 0px !important;
  " src={{asset("assets/image/admin.png")}} alt=""><b style="vertical-align: middle">DMIN</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
      
        <!-- Notifications: style can be found in dropdown.less -->
     
        <!-- Tasks: style can be found in dropdown.less -->
       <li class="dropdown tasks-menu">

        </li> 
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 15px !important">
           
            <span class="hidden-xs"><b>XIN CHÀO </b> {{\Auth::guard("admin")->user()->name ?? null}}</span>
          </a>
      
        </li>
        <!-- Control Sidebar Toggle Button -->
       
      </ul>
    </div>
  </nav>
</header>