<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Cleany - Minimalistic Landing Page</title>
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">        
    
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">       
    
    <!-- Libs CSS -->
    <link href="{{ url('/') }}/assets/front/css/bootstrap.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/front/css/simple-line-icons.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/front/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/front/css/prettyPhoto.css" rel="stylesheet" type="text/css" media="all" />
    
    <!-- Template CSS -->
    <link href="{{ url('/') }}/assets/front/css/style.css" rel="stylesheet"> 

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,800&amp;subsetting=all' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,800,700,300' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
        <script src="./js/html5shiv.js"></script>
        <script src="./js/respond.js"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    
</head>

<body data-spy="scroll" data-target=".navigation">
    
    <!-- Banner --> 
    <div id="banner" class="bg-blur">
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
                            <li class="active"><a href="#banner">Home</a></li>
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
        @yield('header')
        
        @yield('content')

        @yield('script')

    <footer class="footer footer-sub">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <p>&copy; CR HUB. All Right Reserved</p>
                </div>
                <div class="col-lg-6 col-sm-6">
                    
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Bottom -->

    <!-- Start Js Files -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script><!--jQuery is a Javascript library that greatly reduces the amount of code that you must write.-->
    <script type="text/javascript">window.jQuery || document.write('<script src="js/jquery-2.1.0.min.js"><\/script>')</script>
    <script src="{{ url('/') }}/assets/front/js/bootstrap.min.js" type="text/javascript"></script><!--Packed with many functionalies such as carousel slider, responsivity, tabs, drop downs, buttons, and many other features-->
    <script src="{{ url('/') }}/assets/front/js/modernizr.min.js" type="text/javascript"></script><!--Modernizr is an open-source JavaScript library that helps you build the next generation of HTML5 and CSS3-powered websites.-->
    <script src="{{ url('/') }}/assets/front/js/jquery.prettyPhoto.js" type="text/javascript" ></script><!-- Script for Lightbox Image  -->
    <script src="{{ url('/') }}/assets/front/js/custom.js" type="text/javascript"></script><!-- Script File containing all customizations  -->
    <!-- End Js Files  -->

</body>
</html>