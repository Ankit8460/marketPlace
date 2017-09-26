<!DOCTYPE html>
<html>
    <head>
        <script src="{{ url('/') }}/angular/assets/js/angular.min.js"></script>
        <script src="{{ url('/') }}/angular/assets/js/ngScroll.js"></script>
        <script src="{{ url('/') }}/angular/controllers/employee.controller.js"></script>   
        <script src="{{ url('/') }}/angular/controllers/runpay.controller.js"></script>   
        <script src="{{ url('/') }}/angular/assets/js/ui-bootstrap-tpls-0.11.0.js"></script>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>CrHub-Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{ url('/') }}/assets/images/favicon.ico">
         <script src="{{ url('/') }}/assets/js/jquery-1.10.2.min.js"></script>  
        <script src="{{ url('/') }}/assets/plugins/form-parsley/parsley.js"></script>   
         
        <link type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700' rel='stylesheet'>


        

        
        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/morris/morris.css">
        <link href="{{ url('/') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="{{ url('/') }}/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="{{ url('/') }}/assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="{{ url('/') }}/assets/plugins/form-daterangepicker/daterangepicker-bs3.css" type="text/css" rel="stylesheet">
        <link href="{{ url('/') }}/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="{{ url('/') }}/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="{{ url('/') }}/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="{{ url('/') }}/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

        <!-- DataTables -->
        <link href="{{ url('/') }}/assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{ url('/') }}/assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />



        <!-- DataTables -->
        <link href="{{ url('/') }}/assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{ url('/') }}/assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <!--<a href="index.html" class="logo"><span>Up</span>Bond</a>-->
                    <!--<a href="index.html" class="logo-sm"><span>U</span></a>-->
                    <a href="index.html" class="logo"><img src="{{ url('/') }}/assets/img/logo-big.png" height="45px" alt="logo" style="margin-left: -80px;"></a>
                    <a href="index.html" class="logo-sm"><img src="{{ url('/') }}/assets/img/logo-big.png" height="30" alt="logo"></a>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button type="button" class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light notification-icon-box" data-toggle="dropdown" aria-expanded="true">
                                        <i class="ion-ios7-bell"></i> <span class="badge badge-xs badge-danger">17</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notification <span class="badge badge-xs badge-success">3</span></li>
                                        <li class="list-group">
                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                  <i class="fa fa-diamond text-danger noti-sm-icon"></i>
                                                  <div class="noti-content">
                                                      <div class="media-heading">Your order is placed</div>
                                                      <p class="m-0">
                                                          <small>Dummy text of the printing and typesetting industry.</small>
                                                      </p>
                                                  </div>
                                              </div>
                                           </a>
                                           <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                  <i class="fa  fa-envelope-o text-primary noti-sm-icon"></i>
                                                  <div class="noti-content">
                                                      <div class="media-heading">New Message received</div>
                                                      <p class="m-0">
                                                          <small>You have 87 unread messages</small>
                                                      </p>
                                                  </div>
                                              </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <i class="fa fa-fighter-jet text-warning noti-sm-icon"></i>
                                                <div class="noti-content">
                                                    <div class="media-heading">Your item is shipped.</div>
                                                    <p class="m-0">
                                                        <small>It is a long established fact that a reader will</small>
                                                    </p>
                                                </div>
                                            </a>
                                           <!-- last list item -->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <small class="text-primary">See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light notification-icon-box"><i class="ion-qr-scanner"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <img src="{{ url('/') }}/assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle">
                                        <span class="profile-username">
                                            {{ Auth::user()->name }}<span class="caret"></span>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ url('/') }}/admin/profile"><span>Profile</span></a></li>
                                        <li><a href="{{ url('/') }}/admin/Changepassword"><span>Change Password</span></a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{ url('/') }}/admin/logout"><span>Sign Out</span></a></li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <form class="sidebar-search">
                        <div class="">
                            <input type="text" class="form-control search-bar" placeholder="Search...">
                        </div>
                        <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                    </form>

                    <!-- <div class="user-details">
                        <div class="text-center">
                            <img src="{{ url('/') }}/assets/images/users/avatar-1.jpg" alt="" class="img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"> Profile</a></li>
                                    <li><a href="javascript:void(0)"> Settings</a></li>
                                    <li><a href="javascript:void(0)"> Lock screen</a></li>
                                    <li class="divider"></li>
                                    <li><a href="javascript:void(0)"> Logout</a></li>
                                </ul>
                            </div>

                        </div>
                    </div> -->
                    <!--- Divider -->


                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ url('/') }}/admin/dashboard" class="waves-effect"><i class="ti-home"></i><span> Dashboard <span class="badge badge-primary pull-right"></span></span></a>
                            </li>
                            
                            <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-bar-chart"></i><span> PAYROLL </span><span class="pull-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('/') }}/admin/employee"><i class="fa fa-users"></i>Employees</a></li>
                                    <li>
                                       <a href="{{ url('/') }}/admin/paymentdetails"><i class="fa fa-money"></i><span>Run Pay</span></a>
                                    </li>
                                    <li>
                                       <a href="{{ url('/') }}/admin/payHistory"><i class="fa fa-bookmark"></i><span>Pay History</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/') }}/admin/retirementFund"><i class="fa fa-bookmark"></i><span>Retirement Fund</span></a>
                                    </li>
                                </ul>
                            </li>
                            <!--  <li>
                                <a href="{{ url('/') }}/admin/currency"><i class="fa fa-bookmark"></i><span>Currency</span></a>
                            </li>

                             <li>
                                <a href="{{ url('/') }}/admin/tax"><i class="fa fa-bookmark"></i><span>Tax</span></a>
                            </li> -->
                            <?php $admin = \Illuminate\Support\Facades\Auth::user();?>
                            <?php if($admin->id == '1') { ?>
                             <li>
                                <a href="{{ url('/') }}/admin/banks"><i class="fa fa-bookmark"></i><span>Banks</span></a>
                            </li>
                            <?php } ?>
                             <li>
                                <a href="{{ url('/') }}/admin/fundAccount"><i class="fa fa-usd"></i><span>Fund Account</span></a>
                            </li>
                            <li>
                               <a href="{{ url('/') }}/admin/profile"><i class="fa fa-bookmark"></i><span>Account Settings</span></a>
                            </li>

                           

                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                 <div class="page-content">
                            <!--                            <ol class="breadcrumb">
                            
                                                            <li class=""><a href="index.html">Home</a></li>
                                                            <li class="active"><a href="index.html">Dashboard</a></li>
                            
                                                        </ol>-->
                            <div class="page-heading" style="margin-top: 75px;margin-left:35px; ">            
                                <!--<h1>Dashboard</h1>-->
                                @yield('header')
                                <!--                                <div class="options">
                                                                    <div class="btn-toolbar">
                                                                        <form action="" class="form-horizontal row-border" style="display: inline-block;">
                                                                            <div class="form-group hidden-xs">
                                                                                <div class="col-sm-8">
                                                                                    <button class="btn btn-default" id="daterangepicker-d">
                                                                                        <i class="fa fa-calendar"></i> 
                                                                                        <span><?php echo date("F j, Y"); ?></span> <b class="caret"></b>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div> -->
                            </div>
                            <div class="container-fluid" >


                                @yield('content')

                                @yield('script')
                            </div> <!-- .container-fluid -->
                        </div>
               
            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->

         <!-- <script src="{{ url('/') }}/assets/js/jquery.min.js"></script> -->
        <script src="{{ url('/') }}/assets/js/bootstrap.min.js"></script>
        <script src="{{ url('/') }}/assets/js/CSVExport.js"></script>
        <script src="{{ url('/') }}/assets/js/modernizr.min.js"></script>
        <script src="{{ url('/') }}/assets/js/detect.js"></script>
        <script src="{{ url('/') }}/assets/js/fastclick.js"></script>
        <script src="{{ url('/') }}/assets/js/jquery.slimscroll.js"></script>
        <script src="{{ url('/') }}/assets/js/jquery.blockUI.js"></script>
        <script src="{{ url('/') }}/assets/js/waves.js"></script>
        <script src="{{ url('/') }}/assets/js/wow.min.js"></script>
        <script src="{{ url('/') }}/assets/js/jquery.nicescroll.js"></script>
        <script src="{{ url('/') }}/assets/js/jquery.scrollTo.min.js"></script>

        <!--Morris Chart-->
        <script src="{{ url('/') }}/assets/plugins/morris/morris.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/raphael/raphael-min.js"></script>
        <script src="{{ url('/') }}/assets/pages/dashborad.js"></script>
        <script src="{{ url('/') }}/assets/js/app.js"></script>
        <script src="{{ url('/') }}/assets/js/jqueryui-1.10.3.min.js"></script>
        <!-- jQuery  -->
         <script src="{{ url('/') }}/assets/js/jqueryui-1.10.3.min.js"></script>                            <!-- Load jQueryUI -->
        <script src="{{ url('/') }}/assets/js/bootstrapValidator.js"></script>
        <!-- End loading page level scripts-->
        <script src="{{ url('/') }}/assets/js/enquire.min.js"></script>                                     <!-- Load Enquire -->

        <script src="{{ url('/') }}/assets/plugins/velocityjs/velocity.min.js"></script>                    <!-- Load Velocity for Animated Content -->
        <script src="{{ url('/') }}/assets/plugins/velocityjs/velocity.ui.min.js"></script>

        <script src="{{ url('/') }}/assets/plugins/wijets/wijets.js"></script>                          <!-- Wijet -->

        <script src="{{ url('/') }}/assets/plugins/sparklines/jquery.sparklines.min.js"></script>            <!-- Sparkline -->

        <script src="{{ url('/') }}/assets/plugins/codeprettifier/prettify.js"></script>                <!-- Code Prettifier  -->
        <script src="{{ url('/') }}/assets/plugins/bootstrap-switch/bootstrap-switch.js"></script>      <!-- Swith/Toggle Button -->

        <script src="{{ url('/') }}/assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>  <!-- Bootstrap Tabdrop -->

        <script src="{{ url('/') }}/assets/plugins/iCheck/icheck.min.js"></script>                      <!-- iCheck -->

        <script src="{{ url('/') }}/assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js"></script> <!-- nano scroller -->

        <script src="{{ url('/') }}/assets/js/application.js"></script>
        <script src="{{ url('/') }}/assets/demo/demo.js"></script>
        <script src="{{ url('/') }}/assets/demo/demo-switcher.js"></script>

        <!-- Plugins js -->
        <script src="{{ url('/') }}/assets/plugins/timepicker/bootstrap-timepicker.js"></script>
        <script src="{{ url('/') }}/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/assets/pages/form-advanced.js"></script>

        <script src="{{ url('/') }}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="{{ url('/') }}/assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/datatables/jszip.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="{{ url('/') }}/assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="{{ url('/') }}/assets/plugins/datatables/dataTables.scroller.min.js"></script>

        <script src="{{ url('/') }}/assets/pages/datatables.init.js"></script>


    </body>
</html>