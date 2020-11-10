<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="images/favicon.ico">


    <title>Dashboard</title>
    
    <!-- Bootstrap 4.1.3-->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor_components/bootstrap/css/bootstrap.css') }}">
    
    <!-- Bootstrap-extend-->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-extend.css') }}">
    
    <!-- font awesome -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor_components/font-awesome/css/font-awesome.css') }}">
    
    <!-- ionicons -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor_components/Ionicons/css/ionicons.css') }}">
    
    <!-- theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/master_style.css') }}">
    
    <!-- Minimal-art Admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin/css/skins/_all-skins.css') }}">
    
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor_components/jvectormap/jquery-jvectormap.css') }}">
    
    <!-- Morris charts -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor_components/morris.js/morris.css') }}">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

     
  </head>

<body class="hold-transition skin-orange-light sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{route('admin.home')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="{{ asset('admin/images/minimal.png') }}"  alt=""></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Dayuna </b>Dashboard</span>
        </a>
        <!-- Header Navbar-->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account-->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ asset('admin/images/user2-160x160.jpg') }}" class="user-image rounded-circle" alt="User Image">
                </a>
                <ul class="dropdown-menu scale-up">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ asset('admin/images/user2-160x160.jpg') }}" class="float-left rounded-circle" alt="User Image">

                    <p>
                      Maical Clark
                      <small class="mb-5">max@gmail.com</small>
                      <a href="#" class="btn btn-danger btn-sm">View Profile</a>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="row no-gutters">
                      <div class="col-12 text-left">
                        <a href="#"><i class="ion ion-person"></i> My Profile</a>
                      </div>
                      <div class="col-12 text-left">
                        <a href="#"><i class="ion ion-email-unread"></i> Inbox</a>
                      </div>
                      <div class="col-12 text-left">
                        <a href="#"><i class="ion ion-settings"></i> Setting</a>
                      </div>
                    </div>
                    <!-- /.row -->
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-block btn-primary"><i class="ion ion-locked"></i> Lock</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-block btn-danger"><i class="ion ion-power"></i> Log Out</a>
                    </div>
                  </li>
                </ul>
              </li>
              
              <!-- Notifications -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell"></i>
                </a>
                <ul class="dropdown-menu scale-up">
                  <li class="header">You have 7 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu inner-content-div">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> Curabitur id eros quis nunc suscipit blandit.
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> In gravida mauris et nisi
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> Praesent eu lacus in libero dictum fermentum.
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> Nunc fringilla lorem 
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></a>
              </li>
            </ul>
          </div>
        </nav>
    </header>
<aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image float-left">
          <img src="{{ asset('admin/images/user2-160x160.jpg') }}" class="rounded-circle" alt="User Image">
        </div>
        <div class="info float-left">
          <p>Dayuna Administrator</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
          <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      </div>
      
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="active">
          <a href="{{route('admin.home')}}">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>        
        </li>
        <li class="">
          <a href="{{route('getSliderManage')}}">
            <i class="fa fa-dashboard"></i>
            <span>Slider</span>
          </a>        
        </li>
        <li class="">
          <a href="{{route('getCatagoryManage')}}">
            <i class="fa fa-dashboard"></i>
            <span>Catagory</span>
          </a>        
        </li>
        <li class="">
          <a href="{{route('getProductManage')}}">
            <i class="fa fa-dashboard"></i>
            <span>Product</span>
          </a>        
        </li>
        <li class="">
          <a href="{{route('getManageShipping')}}">
            <i class="fa fa-dashboard"></i>
            <span>Shipping</span>
          </a>        
        </li>
        <li class="">
          <a href="{{route('getAdminOrder')}}">
            <i class="fa fa-dashboard"></i>
            <span>Order</span>
          </a>        
        </li>
          
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/boxed.html">Boxed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html">Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>App</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/widgets/widgets.html">Widgets</a></li>
            <li><a href="pages/widgets/weather.html">Weather</a></li>
            <li><a href="pages/widgets/calendar.html">Calendar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html">ChartJS</a></li>
            <li><a href="pages/charts/morris.html">Morris</a></li>
            <li><a href="pages/charts/flot.html">Flot</a></li>
            <li><a href="pages/charts/inline.html">Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html">General</a></li>
            <li><a href="pages/UI/cards.html">User Cards</a></li>
            <li><a href="pages/UI/tab.html">Tab</a></li>
            <li><a href="pages/UI/sweatalert.html">Sweet Alert</a></li>
            <li><a href="pages/UI/notification.html">Notification</a></li>
            <li><a href="pages/UI/icons.html">Icons</a></li>
            <li><a href="pages/UI/buttons.html">Buttons</a></li>
            <li><a href="pages/UI/sliders.html">Sliders</a></li>
            <li><a href="pages/UI/timeline.html">Timeline</a></li>
            <li><a href="pages/UI/modals.html">Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html">General Elements</a></li>
            <li><a href="pages/forms/advanced.html">Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html">Editors</a></li>
            <li><a href="pages/forms/form-validation.html">Form Validation</a></li>
            <li><a href="pages/forms/form-wizard.html">Form Wizard</a></li>
            <li><a href="pages/forms/code-editor.html">Code Editor</a></li>
            <li><a href="pages/forms/editor-markdown.html">Markdown</a></li>
            <li><a href="pages/forms/xeditable.html">Xeditable Editor</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html">Simple tables</a></li>
            <li><a href="pages/tables/data.html">Data tables</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/mailbox/mailbox.html">Inbox</a></li>
            <li><a href="pages/mailbox/compose.html">Compose</a></li>
            <li><a href="pages/mailbox/read-mail.html">Read</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-map"></i> <span>Map</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/map/map-google.html">Google Map</a></li>
            <li><a href="pages/map/map-vector.html">Vector Map</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Sample Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html">Invoice</a></li>
            <li><a href="pages/examples/profile.html">Profile</a></li>
            <li><a href="pages/examples/gallery.html">Gallery</a></li>
            <li><a href="pages/examples/faq.html">FAQs</a></li>
            <li><a href="pages/examples/login.html">Login</a></li>
            <li><a href="pages/examples/register.html">Register</a></li>
            <li><a href="pages/examples/lockscreen.html">Lockscreen</a></li>
            <li><a href="pages/examples/404.html">404 Error</a></li>
            <li><a href="pages/examples/500.html">500 Error</a></li>
            <li><a href="pages/examples/blank.html">Blank Page</a></li>
            <li><a href="pages/examples/pace.html">Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Level One</a></li>
            <li class="treeview">
              <a href="#">Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Level Two</a></li>
                <li class="treeview">
                  <a href="#">Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#">Level Three</a></li>
                    <li><a href="#">Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#">Level One</a></li>
          </ul>
        </li>        
        
      </ul>
    </section>
    <!-- /.sidebar -->
    <div class="sidebar-footer">
        <!-- item-->
        <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog fa-spin"></i></a>
        <!-- item-->
        <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="fa fa-envelope"></i></a>
        <!-- item-->
        <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
    </div>
</aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
      <b>Version</b> 1.1
    </div>Copyright &copy; 2020 <a href="">Dayuna</a>. All Rights Reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="nav-item"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li class="nav-item"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-cog fa-spin"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Admin Birthday</h4>

                <p>Will be July 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Jhone Updated His Profile</h4>

                <p>New Email : jhone_doe@demo.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Disha Joined Mailing List</h4>

                <p>disha@demo.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Code Change</h4>

                <p>Execution time 15 Days</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Web Design
                <span class="label label-danger pull-right">40%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 40%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Data
                <span class="label label-success pull-right">75%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 75%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Order Process
                <span class="label label-warning pull-right">89%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 89%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Development 
                <span class="label label-primary pull-right">72%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 72%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <input type="checkbox" id="report_panel" class="chk-col-grey" >
            <label for="report_panel" class="control-sidebar-subheading ">Report panel usage</label>

            <p>
              general settings information
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <input type="checkbox" id="allow_mail" class="chk-col-grey" >
            <label for="allow_mail" class="control-sidebar-subheading ">Mail redirect</label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <input type="checkbox" id="expose_author" class="chk-col-grey" >
            <label for="expose_author" class="control-sidebar-subheading ">Expose author name</label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <input type="checkbox" id="show_me_online" class="chk-col-grey" >
            <label for="show_me_online" class="control-sidebar-subheading ">Show me as online</label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <input type="checkbox" id="off_notifications" class="chk-col-grey" >
            <label for="off_notifications" class="control-sidebar-subheading ">Turn off notifications</label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">              
              <a href="javascript:void(0)" class="text-red margin-r-5"><i class="fa fa-trash-o"></i></a>
              Delete chat history
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
    
     
      
    
    <!-- jQuery 3 -->
    <script src="{{ asset('admin/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js') }}"></script>
    
    <!-- popper -->
    <script src="{{ asset('admin/assets/vendor_components/popper/dist/popper.min.js') }}"></script>
    
    <!-- Bootstrap 4.1.3-->
    <script src="{{ asset('admin/assets/vendor_components/bootstrap/js/bootstrap.js') }}"></script>  
    
    <!-- ChartJS -->
    <script src="{{ asset('admin/assets/vendor_components/chart-js/chart.js') }}"></script>
    
    <!-- Sparkline -->
    <script src="{{ asset('admin/assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js') }}"></script>
    
    <!-- jvectormap -->
    <script src="{{ asset('admin/assets/vendor_plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script> 
    <script src="{{ asset('admin/assets/vendor_plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script> 
    
    <!-- Morris.js charts -->
    <script src="{{ asset('admin/assets/vendor_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor_components/morris.js/morris.min.js') }}"></script>
    
    <!-- Slimscroll -->
    <script src="{{ asset('admin/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    
    <!-- FastClick -->
    <script src="{{ asset('admin/assets/vendor_components/fastclick/lib/fastclick.js') }}"></script>
    
    <!-- Minimal-art Admin App -->
    <script src="{{ asset('admin/js/template.js') }}"></script>
    
    <!-- Minimal-art Admin dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('admin/js/pages/dashboard.js') }}"></script>
    
    <!-- Minimal-art Admin for demo purposes -->
    <script src="{{ asset('admin/js/demo.js') }}"></script>

    
</body>

</html>

