<header class="main-header">
    <!-- Logo -->
    <a href="{{ aurl('') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">{{config('app.name')}}</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('adminlte/dist/img/user11.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{optional(admin()->user())->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('adminlte/dist/img/user11.jpg')}}" class="img-circle" alt="User Image">

                <p>
                {{optional(admin()->user())->name}}
                 
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                 
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ aurl('admin/'.admin()->user()->id.'/edit') }}" class="btn btn-default btn-flat">profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{url('admin/logout')}}" class="btn btn-default btn-flat">Sign_out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
        <li> <a href="{{ aurl('') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a> </li>

        <li><a href="{{ aurl('admin') }}"><i class="fa fa-users"></i> <span>Admins</span></a></li>

        <li><a href="{{ aurl('categories') }}"><i class="fa fa-book"></i> <span>Categories</span></a></li>
        <li><a href="{{ aurl('projects') }}"><i class="fa fa-flag"></i> <span>Projects</span></a></li>
        <li> <a href="{{ aurl('services') }}"><i class="fa fa-list-ul"></i> <span>Services</span> </a> </li>
        <li> <a href="{{ aurl('sliders') }}"><i class="fa fa-list-ul"></i> <span>Slider</span> </a> </li>
        <li> <a href="{{ aurl('testimonials') }}"><i class="fa fa-list-ul"></i> <span>Testimonials</span> </a> </li>
        <li> <a href="{{ aurl('clients') }}"><i class="fa fa-users"></i> <span>Clients</span> </a> </li>
        <li> <a href="{{ aurl('team') }}"><i class="fa fa-users"></i> <span>Team</span> </a> </li>
        <li><a href="{{ aurl('contacts') }}"><i class="fa fa-envelope"></i> <span>Contact Us</span> </a> </li>
       <li ><a href="{{ aurl('settings') }}"><i class="fa fa-cog"></i> <span>Settings</span> </a> </li>
       <li ><a href="{{ aurl('sections') }}"><i class="fa fa-cog"></i> <span>Sections</span> </a> </li>
       <li><a href="{{aurl('change-password')}}"><i class="fa fa-key"></i>Change Password</a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
