<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <title>@yield('title','Dashboard')</title>

		    <link rel="shortcut icon" href="{{asset('contents/admin')}}/images/favicon_1.ico">
        <link href="{{asset('contents/admin')}}/css/bootstrap.min.css" rel="stylesheet" />
        <link href="{{asset('contents/admin')}}/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="{{asset('contents/admin')}}/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="{{asset('contents/admin')}}/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="{{asset('contents/admin')}}/css/animate.css" rel="stylesheet" />
        <link href="{{asset('contents/admin')}}/css/waves-effect.css" rel="stylesheet">
        <link href="{{asset('contents/admin')}}/assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">
        <link href="{{asset('contents/admin')}}/css/helper.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('contents/admin')}}/css/style.css" rel="stylesheet" type="text/css" />

        <script src="{{asset('contents/admin')}}/js/modernizr.min.js"></script>

        <!-- DataTables -->
        <link href="{{asset('contents/admin')}}/assets/datatables/jquery.dataTables.min.css" rel="stylesheet"/>

        <!--toastr-->
        <link href="{{asset('contents/admin')}}/css/toastr.min.css" rel="stylesheet" />

        <!--datetimepicker-->
        <link href="{{asset('contents/admin')}}/css/jquery.datetimepicker.min.css" rel="stylesheet" />

        {!! Charts::assets() !!}

    </head>

    <body class="fixed-left">

        <div id="wrapper">

            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="{{url('admin')}}" class="logo"><i class="fa fa-line-chart"></i> <span> AayBay </span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <!-- <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form> -->

                            <ul class="nav navbar-nav navbar-right pull-right">

                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{asset('storage/user/'.Auth::user()->image)}}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                        <li><a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="md md-settings-power"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="{{asset('storage/user/'.Auth::user()->image)}}" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{Auth::User()->name}}</a>
                            </div>

                            @php
                              $roles = \App\Role::all();
                            @endphp
                            @foreach($roles as $role)
                              <p class="text-muted m-0"><h4 class="text-danger">@if (Auth::user()->role_id==$role->id) {{$role->name}} @endif</h4></p>
                            @endforeach
                        </div>
                    </div>

                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{url('admin')}}" class="dashboard waves-effect {{Request::is ('admin') ? 'active' : ''}}"><i class="fa fa-home"></i><span> Dashboard </span></a>
                            </li>

                            <li>
                                <a href="{{url('admin/user')}}" class="waves-effect {{Request::is ('admin/user') ? 'active' : ''}}"><i class="fa fa-users"></i><span> Users </span></a>
                            </li>

                            <!-- <li>
                                <a href="{{url('admin/recycle/user')}}" class="waves-effect {{Request::is ('admin/recycle/user') ? 'active' : ''}}"><i class="md md-home"></i><span> User Recycle </span></a>
                            </li> -->

                            <!-- <li class="has_sub">
                                <a href="#" class="waves-effect"><i class=" fa fa-user"></i><span> User </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                  <li>
                                    <li>
                                        <a href="{{url('admin/user')}}" class="waves-effect {{Request::is ('admin/user') ? 'active' : ''}}"><i class="md md-home"></i><span> All User </span></a>
                                    </li>

                                    <li>
                                        <a href="{{url('admin/recycle/user')}}" class="waves-effect {{Request::is ('admin/recycle/user') ? 'active' : ''}}"><i class="md md-home"></i><span> User Recycle </span></a>
                                    </li>
                                  </li>
                                </ul>
                            </li> -->

                            <li>
                              <a href="{{url('admin/manage')}}" class="waves-effect {{Request::is ('admin/manage') ? 'active' : ''}}"><i class="fa fa-gears"></i><span> Manage </span></a>
                            </li>

                            <li>
                              <a href="{{url('admin/summary')}}" class="waves-effect {{Request::is ('admin/summary') ? 'active' : ''}}"><i class="fa fa-file-text-o"></i><span> Summary </span></a>
                            </li>


                            <li>
                                <a href="{{url('admin/income')}}" class="waves-effect {{Request::is ('admin/income') ? 'active' : ''}}"><i class="fa fa-google-wallet"></i><span> Income </span></a>
                            </li>

                            <!-- <li>
                                <a href="{{url('admin/recycle/income')}}" class="waves-effect {{Request::is ('admin/recycle/income') ? 'active' : ''}}"><i class="md md-home"></i><span> Income Recycle </span></a>
                            </li>

                            <li>
                                <a href="{{url('admin/income/category')}}" class="waves-effect {{Request::is ('admin/income/category') ? 'active' : ''}}"><i class="md md-home"></i><span> Income Category </span></a>
                            </li> -->

                            <!-- <li class="has_sub">
                                <a href="#" class="waves-effect"><i class=" fa fa-user"></i><span> Income </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                  <li>
                                    <li>
                                        <a href="{{url('admin/income')}}" class="waves-effect {{Request::is ('admin/income') ? 'active' : ''}}"><i class="md md-home"></i><span> All Income </span></a>
                                    </li>

                                    <li>
                                        <a href="{{url('admin/recycle/income')}}" class="waves-effect {{Request::is ('admin/recycle/income') ? 'active' : ''}}"><i class="md md-home"></i><span> Income Recycle </span></a>
                                    </li>

                                    <li>
                                        <a href="{{url('admin/income/category')}}" class="waves-effect {{Request::is ('admin/income/category') ? 'active' : ''}}"><i class="md md-home"></i><span> Income Category </span></a>
                                    </li>
                                  </li>
                                </ul>
                            </li> -->

                            <li>
                              <a href="{{url('admin/expense')}}" class="waves-effect {{Request::is ('admin/expense') ? 'active' : ''}}"><i class="fa fa-calculator"></i><span> Expense </span></a>
                            </li>

                            <!-- <li>
                                <a href="{{url('admin/recycle/expense')}}" class="waves-effect {{Request::is ('admin/recycle/expense') ? 'active' : ''}}"><i class="md md-home"></i><span> Expense Recycle </span></a>
                            </li>

                            <li>
                                <a href="{{url('admin/expense/category')}}" class="waves-effect {{Request::is ('admin/expense/category') ? 'active' : ''}}"><i class="md md-home"></i><span> Expense Category </span></a>
                            </li> -->

                            <!-- <li class="has_sub">
                                <a href="#" class="waves-effect"><i class=" fa fa-user"></i><span> Expense </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                  <li>
                                    <li>
                                      <a href="{{url('admin/expense')}}" class="waves-effect {{Request::is ('admin/expense') ? 'active' : ''}}"><i class="md md-home"></i><span> All Expense </span></a>
                                    </li>

                                    <li>
                                        <a href="{{url('admin/recycle/expense')}}" class="waves-effect {{Request::is ('admin/recycle/expense') ? 'active' : ''}}"><i class="md md-home"></i><span> Expense Recycle </span></a>
                                    </li>

                                    <li>
                                        <a href="{{url('admin/expense/category')}}" class="waves-effect {{Request::is ('admin/expense/category') ? 'active' : ''}}"><i class="md md-home"></i><span> Expense Category </span></a>
                                    </li>
                                  </li>
                                </ul>
                            </li> -->


                            <li>
                              <a href="{{url('admin/loaner')}}" class="waves-effect {{Request::is ('admin/loaner') ? 'active' : ''}}"><i class="fa fa-user-plus"></i><span> Lonar Information </span></a>
                            </li>


                            <li>
                                <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="waves-effect"><i class="md md-settings-power"></i><span> Logout </span></a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="content-page">
                <div class="content">
                    <div class="container">

                        <!-- <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div> -->

						@yield('content')

                        </div>

                    </div>

                </div>

                <footer class="footer text-right">
                    2020 © Developed by SHOHEL
                </footer>
            </div>
        </div>

        <script>
            var resizefunc = [];
        </script>

        <script src="{{asset('contents/admin')}}/js/jquery.min.js"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
        <script src="{{asset('contents/admin')}}/js/bootstrap.min.js"></script>
        <script src="{{asset('contents/admin')}}/js/waves.js"></script>
        <script src="{{asset('contents/admin')}}/js/wow.min.js"></script>
        <script src="{{asset('contents/admin')}}/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="{{asset('contents/admin')}}/js/jquery.scrollTo.min.js"></script>
        <script src="{{asset('contents/admin')}}/assets/chat/moment-2.2.1.js"></script>
        <script src="{{asset('contents/admin')}}/assets/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="{{asset('contents/admin')}}/assets/jquery-detectmobile/detect.js"></script>
        <script src="{{asset('contents/admin')}}/assets/fastclick/fastclick.js"></script>
        <script src="{{asset('contents/admin')}}/assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="{{asset('contents/admin')}}/assets/jquery-blockui/jquery.blockUI.js"></script>

        <script src="{{asset('contents/admin')}}/assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="{{asset('contents/admin')}}/assets/sweet-alert/sweet-alert.init.js"></script>

        <script src="{{asset('contents/admin')}}/assets/flot-chart/jquery.flot.js"></script>
        <script src="{{asset('contents/admin')}}/assets/flot-chart/jquery.flot.time.js"></script>
        <script src="{{asset('contents/admin')}}/assets/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="{{asset('contents/admin')}}/assets/flot-chart/jquery.flot.resize.js"></script>
        <script src="{{asset('contents/admin')}}/assets/flot-chart/jquery.flot.pie.js"></script>
        <script src="{{asset('contents/admin')}}/assets/flot-chart/jquery.flot.selection.js"></script>
        <script src="{{asset('contents/admin')}}/assets/flot-chart/jquery.flot.stack.js"></script>
        <script src="{{asset('contents/admin')}}/assets/flot-chart/jquery.flot.crosshair.js"></script>
        <script src="{{asset('contents/admin')}}/assets/counterup/waypoints.min.js" type="text/javascript"></script>
        <script src="{{asset('contents/admin')}}/assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="{{asset('contents/admin')}}/js/jquery.app.js"></script>
        <script src="{{asset('contents/admin')}}/js/jquery.dashboard.js"></script>
        <script src="{{asset('contents/admin')}}/js/jquery.chat.js"></script>
        <script src="{{asset('contents/admin')}}/js/jquery.todo.js"></script>

        <!--Custom JS-->
        <script src="{{asset('contents/admin')}}/js/custom.js"></script>

        <!--toastr-->
        <script src="{{asset('contents/admin')}}/js/toastr.min.js"></script>

        <!-- Toastr without composer code start -->
        @if(Session::has('success'))
      		<script>
      			toastr.success("{{ Session::get('success') }}", "success", {
              positionClass : "toast-top-full-width",
      				closeButton: true,
      				progressBar: true,
              timeOut : "3000",
      			});
      		</script>
      	@endif
      	@if(Session::has('info'))
      		<script>
      			toastr.info("{{ Session::get('info') }}");
      		</script>
      	@endif
      	@if(Session::has('warning'))
      		<script>
      			toastr.warning("{{ Session::get('warning') }}");
      		</script>
      	@endif
      	@if(Session::has('error'))
      		<script>
      			toastr.error("{{ Session::get('error') }}", "error",{
              positionClass : "toast-top-full-width",
              closeButton: true,
              progressBar: true,
              timeOut : "3000",
            });
      		</script>
      	@endif
        <!-- Toastr without composer code end -->

        <!-- DataTables -->
        <script src="{{asset('contents/admin')}}/assets/datatables/jquery.dataTables.min.js"></script>
        <script src="{{asset('contents/admin')}}/assets/datatables/dataTables.bootstrap.js"></script>

        <!--datetimepicker-->
        <script src="{{asset('contents/admin')}}/js/jquery.datetimepicker.full.min.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>

    </body>
</html>
