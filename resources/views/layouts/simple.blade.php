<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>Cr-Hub - Admin </title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->

		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="{{ url('/') }}/assets/plugins/iCheck/skins/minimal/blue.css">
		<link rel="stylesheet" href="{{ url('/') }}/assets/fonts/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ url('/') }}/assets/fonts/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="{{ url('/') }}/assets/css/styles.css">


		
	    <link href="{{ url('/') }}/assets/front/css/style.css" rel="stylesheet"> 
		<!--[if IE 7]>

		<link rel="stylesheet" href="{{ url('/') }}/assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
		<!-- end: MAIN CSS -->
		
	</head>
        <!-- Start Header -->
        <div id="header">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Start Logo / Text -->
                        <a class="navbar-brand text-logo" href="#"><img src="{{ url('/') }}/assets/front/img/logo.svg"></a>
                        <!-- <a class="navbar-brand text-logo scrollTx" href="#"><img src="img/logo1.svg" style="display: none;"></a> -->
                        <!-- End Logo / Text -->
                    </div>
                    <!-- Start Navigation -->
                    <div class="navigation navbar-collapse collapse">
                        <ul class="nav navbar-nav menu-right">
                            <li><a href="{{url('')}}">Home</a></li>
                            <li><a href="#intro">Contractor Payroll</a></li>
                            <li><a href="#how-it-works">How it works</a></li>
                            <li><a href="#faq">Contact us</a></li>
                            <li><a href="{{ url('admin/login') }}">Login</a></li>
                            <li><a href="{{ url('admin/register') }}">SignUp</a></li>
                        </ul>
                    </div>
                    <!-- End Navigation  -->
                </div>
            </nav>
        </div>
	 <body class="focused-form animated-content">
		<div class="container" id="login-form">
			<!-- <a  class="login-logo" ><img style="height: 60px" src="{{ url('/') }}/assets/img/logo-big.png"></a> -->
			@yield('header')

	    	@yield('content')

	    	@yield('script')

    		
			<!-- end: COPYRIGHT -->
		</div>

				
		 <!-- Sparkline -->

  					<!-- iCheck -->
  					
		<script src="{{ url('/') }}/assets/js/jquery-1.10.2.min.js"></script>
		<script src="{{ url('/') }}/assets/js/jqueryui-1.10.3.min.js"></script>
		<script src="{{ url('/') }}/assets/js/bootstrap.min.js"></script>
		<script src="{{ url('/') }}/assets/js/enquire.min.js"></script>
		<script src="{{ url('/') }}/assets/plugins/velocityjs/velocity.min.js"></script>
		<script src="{{ url('/') }}/assets/plugins/velocityjs/velocity.ui.min.js"></script>
		<script src="{{ url('/') }}/assets/plugins/wijets/wijets.js"></script>
		<script src="{{ url('/') }}/assets/plugins/sparklines/jquery.sparklines.min.js"></script>
		<script src="{{ url('/') }}/assets/plugins/codeprettifier/prettify.js"></script>
		<script src="{{ url('/') }}/assets/plugins/bootstrap-switch/bootstrap-switch.js"></script>
		<script src="{{ url('/') }}/assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>
		<script src="{{ url('/') }}/assets/plugins/iCheck/icheck.min.js"></script>
		<script src="{{ url('/') }}/assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js"></script>
		<script src="{{ url('/') }}/assets/js/application.js"></script>
		<script src="{{ url('/') }}/assets/demo/demo.js"></script>
		<script src="{{ url('/') }}/assets/demo/demo-switcher.js"></script>
		
	</body>
	<!-- end: BODY -->
</html>