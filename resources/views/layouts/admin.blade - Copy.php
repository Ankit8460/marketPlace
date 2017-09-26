<!DOCTYPE html>
<!-- Template Name: MZIGO - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.4 Author: MZIGO -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>MZIGO - Admin</title>
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
		<link rel="stylesheet" href="{{ url('/') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{ url('/') }}/assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ url('/') }}/assets/fonts/style.css">
		<link rel="stylesheet" href="{{ url('/') }}/assets/css/main.css">
		<link rel="stylesheet" href="{{ url('/') }}/assets/css/main-responsive.css">
		<link rel="stylesheet" href="{{ url('/') }}/assets/plugins/iCheck/skins/all.css">
		<link rel="stylesheet" href="{{ url('/') }}/assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css">
		<link rel="stylesheet" href="{{ url('/') }}/assets/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
		<link rel="stylesheet" href="{{ url('/') }}/assets/css/theme_light.css" type="text/css" id="skin_color">
		<link rel="stylesheet" href="{{ url('/') }}/assets/css/custom.css" type="text/css" id="skin_color">
		<link rel="stylesheet" href="{{ url('/') }}/assets/css/print.css" type="text/css" media="print"/>
		<!--[if IE 7]>
		<link rel="stylesheet" href="{{ url('/') }}/assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
		<!-- end: MAIN CSS -->
		{{--*/ $base_route = Route::currentRouteAction() /*--}}
		<?php
		$base_route = explode("\\", $base_route);
		
		if($base_route[3] == 'HomeController@index'){
		
		?>

		<?php }else{ 

			if(isset($base_route[4])){
				$controller = explode('@', $base_route[4]);
			}
			
			?>


			<?php if($controller[1] == 'index'){ ?> 

				<link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/plugins/select2/select2.css" />
				<link rel="stylesheet" href="{{ url('/') }}/assets/plugins/DataTables/media/css/DT_bootstrap.css" />
	
			<?php }elseif($controller[1] == 'add' || $controller[1] == 'edit') { ?>

					<link rel="stylesheet" href="{{ url('/') }}/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
					<link rel="stylesheet" href="{{ url('/') }}/assets/plugins/datepicker/css/datepicker.css">
					<link rel="stylesheet" href="{{ url('/') }}/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
			<?php } ?>
			
		<?php } ?>
		<link rel="shortcut icon" href="{{ url('/') }}/assets/images/mazigo_fav.png" />
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body>
		<!-- start: HEADER -->
		<div class="navbar navbar-inverse navbar-fixed-top">
			<!-- start: TOP NAVIGATION CONTAINER -->
			<div class="container">
				<div class="navbar-header">
					<!-- start: RESPONSIVE MENU TOGGLER -->
					<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
						<span class="clip-list-2"></span>
					</button>
					<!-- end: RESPONSIVE MENU TOGGLER -->
					<!-- start: LOGO -->
					<a class="navbar-brand" href="{{ url('/') }}/admin/home">
						MZIGO
					</a>
					<!-- end: LOGO -->
				</div>
				<div class="navbar-tools">
					<!-- start: TOP NAVIGATION MENU -->
					<ul class="nav navbar-right">
						
						<!-- start: USER DROPDOWN -->
						<li class="dropdown current-user">
							<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
								<span class="username">Welcome Admin</span>
								<i class="clip-chevron-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="{{ url('/') }}/admin/logout">
										<i class="clip-exit"></i>
										&nbsp;Log Out
									</a>
								</li>
							</ul>
						</li>
						<!-- end: USER DROPDOWN -->
					</ul>
					<!-- end: TOP NAVIGATION MENU -->
				</div>
			</div>
			<!-- end: TOP NAVIGATION CONTAINER -->
		</div>
		<!-- end: HEADER -->
    	
    	@yield('header')
    	<!-- start: MAIN CONTAINER -->
        <div class="main-container">
            <div class="navbar-content">
                <!-- start: SIDEBAR -->
                <div class="main-navigation navbar-collapse collapse">
                    
                    <!-- start: MAIN NAVIGATION MENU -->
                    @include('admin.includes.slider')
                    <!-- end: MAIN NAVIGATION MENU -->
                </div>
                <!-- end: SIDEBAR -->
            </div>
            <!-- start: PAGE -->
    			@yield('content')
    		<!-- end: PAGE -->
        </div>
        <!-- end: MAIN CONTAINER -->

    	@yield('script')

    	<!-- start: FOOTER -->
		<div class="footer clearfix">
			<div class="footer-inner">
				{{date("Y")}} &copy; Mzigo.
			</div>
			<div class="footer-items">
				<span class="go-top"><i class="clip-chevron-up"></i></span>
			</div>
		</div>
		<!-- end: FOOTER -->
		

		<!-- start: MAIN JAVASCRIPTS -->

		<!--[if lt IE 9]>
		<script src="{{ url('/') }}/assets/plugins/respond.min.js"></script>
		<script src="{{ url('/') }}/assets/plugins/excanvas.min.js"></script>
		<script type="text/javascript" src="{{ url('/') }}/assets/plugins/jQuery-lib/1.10.2/jquery.min.js"></script>
		<![endif]-->

		<!--[if gte IE 9]><!-->
		<script src="{{ url('/') }}/assets/plugins/jQuery-lib/2.0.3/jquery.min.js"></script>
		<!--<![endif]-->
		<script src="{{ url('/') }}/assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
		<script src="{{ url('/') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="{{ url('/') }}/assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
		<script src="{{ url('/') }}/assets/plugins/blockUI/jquery.blockUI.js"></script>
		<script src="{{ url('/') }}/assets/plugins/iCheck/jquery.icheck.min.js"></script>
		<script src="{{ url('/') }}/assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
		<script src="{{ url('/') }}/assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
		<script src="{{ url('/') }}/assets/plugins/less/less-1.5.0.min.js"></script>
		<script src="{{ url('/') }}/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
		<script src="{{ url('/') }}/assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
		<script src="{{ url('/') }}/assets/js/main.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		
		<!-- fancybox start -->
		<link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
		<script type="text/javascript" src="{{ url('/') }}/assets/plugins/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
		<script type="text/javascript">
			$(".single_1").fancybox({
                helpers: {
                    title : {
                        type : 'float'
                    }
                }
            });
		</script>
		<!-- fancybox end -->
		{{--*/ $base_route = Route::currentRouteAction() /*--}}
		
		<?php
		$base_route = explode("\\", $base_route);
		$controller = '';
		if($base_route[3] == 'HomeController@index'){
		
		?>

		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		
		<script src="{{ url('/') }}/assets/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
			});
		</script>

		
		<?php }else{ 

			if(isset($base_route[4])){
				$controller = explode('@', $base_route[4]);
			}
			
			if($controller[0] == 'Truck_typeController'){

				if($controller[1] == 'index'){
			?> 

					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/bootbox/bootbox.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/select2/select2.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
					<script src="{{ url('/') }}/assets/js/table-data.js"></script>

					<script>
						jQuery(document).ready(function() {
							Main.init();
							TableData.init();
						});
						$('#sample_1').dataTable({
						  aaSorting: [[0, 'asc']]
						});
						
					</script>

				<?php }elseif ($controller[1] == 'add' || $controller[1] == 'edit') { ?>
					<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					<script src="{{ url('/') }}/assets/js/bootstrapValidator.js"></script>
					<script src="{{ url('/') }}/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
					<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					<script>
						jQuery(document).ready(function() {
							Main.init();
						});
					</script>

					@yield('script_validation')

					
				<?php } ?>

			<?php } ?>

			<!-- CustomerController Start -->
			
				<?php if($controller[0] == 'CustomerController'){
					if($controller[1] == 'index'){
				?> 

					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/select2/select2.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
					<script src="{{ url('/') }}/assets/js/table-data.js"></script>

					<script>
						jQuery(document).ready(function() {
							Main.init();
							TableData.init();
						});
						$('#sample_1').dataTable({
						  aaSorting: [[0, 'asc']]
						});
					</script>

				<?php }elseif ($controller[1] == 'add' || $controller[1] == 'edit') { ?>

					<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					<script src="{{ url('/') }}/assets/js/bootstrapValidator.js"></script>
					<script src="{{ url('/') }}/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
					<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					<script>
						jQuery(document).ready(function() {
							Main.init();
						});
					</script>

					@yield('script_validation')
				<?php } ?>
			
			<?php } ?>
			
			<!-- CustomerController End -->
			
			<!-- CategoryController Start -->
			
				<?php if($controller[0] == 'CategoryController'){
					if($controller[1] == 'index'){
				?> 

					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/bootbox/bootbox.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/select2/select2.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
					<script src="{{ url('/') }}/assets/js/table-data.js"></script>

					<script>
						jQuery(document).ready(function() {
							Main.init();
							TableData.init();
						});
						$('#sample_1').dataTable({
						  aaSorting: [[0, 'asc']]
						});
					</script>

				<?php }elseif ($controller[1] == 'add' || $controller[1] == 'edit') { ?>

					<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					<script src="{{ url('/') }}/assets/js/bootstrapValidator.js"></script>
					<script src="{{ url('/') }}/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
					<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					<script>
						jQuery(document).ready(function() {
							Main.init();
						});
					</script>

					@yield('script_validation')
				<?php } ?>
			
			<?php } ?>
			
			<!-- CategoryController End -->
			
			<!-- DriverController Start -->
			
			<?php if($controller[0] == 'DriverController'){
				if($controller[1] == 'index'){
			?>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/bootbox/bootbox.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/select2/select2.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
					<script src="{{ url('/') }}/assets/js/table-data.js"></script>

					<script>
						jQuery(document).ready(function() {
							Main.init();
							TableData.init();
						});
						$('#sample_1').dataTable({
						  aaSorting: [[0, 'asc']]
						});
					</script>

				<?php }elseif ($controller[1] == 'add' || $controller[1] == 'edit') { ?>

					<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					<script src="{{ url('/') }}/assets/js/bootstrapValidator.js"></script>
					<script src="{{ url('/') }}/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
					<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					<script>
						jQuery(document).ready(function() {
							Main.init();
						});
					</script>

					@yield('script_validation')
				<?php } ?>
			
			<?php } ?>

			<!-- DriverController End -->

			<!-- HelperController Start -->
			
			<?php if($controller[0] == 'HelperController'){
				if($controller[1] == 'index'){
			?>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/bootbox/bootbox.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/select2/select2.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
					<script src="{{ url('/') }}/assets/js/table-data.js"></script>

					<script>
						jQuery(document).ready(function() {
							Main.init();
							TableData.init();
						});
						$('#sample_1').dataTable({
						  aaSorting: [[0, 'asc']]
						});
					</script>

				<?php }elseif ($controller[1] == 'add' || $controller[1] == 'edit') { ?>

					<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					<script src="{{ url('/') }}/assets/js/bootstrapValidator.js"></script>
					<script src="{{ url('/') }}/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
					<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					<script>
						jQuery(document).ready(function() {
							Main.init();
						});
					</script>

					@yield('script_validation')
				<?php } ?>
			
			<?php } ?>

			<!-- HelperController End -->
			<!-- Promo_codeController Start -->
			
			<?php if($controller[0] == 'Promo_codeController'){
				if($controller[1] == 'index'){
			?>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/bootbox/bootbox.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
					
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
					<script src="{{ url('/') }}/assets/js/table-data.js"></script>

					<script>
						jQuery(document).ready(function() {
							Main.init();
							TableData.init();
						});
						$('#sample_1').dataTable({
						  aaSorting: [[0, 'asc']]
						});
					</script>

				<?php }elseif ($controller[1] == 'add' || $controller[1] == 'edit') { ?>

					<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					<script src="{{ url('/') }}/assets/js/bootstrapValidator.js"></script>
					<script src="{{ url('/') }}/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
					<script src="{{ url('/') }}/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
					<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					<script>
						jQuery(document).ready(function() {
							Main.init();
							$('.date-picker').datepicker({
					            autoclose: true
					        });
						});
					</script>
					<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					@yield('script_validation')
				<?php } ?>
			
			<?php } ?>

			<!-- HelperController End -->

			<!-- Weight_classController Start -->
			
			<?php if($controller[0] == 'Weight_classController'){
				if($controller[1] == 'index'){
			?>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/bootbox/bootbox.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/select2/select2.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
					<script src="{{ url('/') }}/assets/js/table-data.js"></script>

					<script>
						jQuery(document).ready(function() {
							Main.init();
							TableData.init();
						});
						$('#sample_1').dataTable({
						  aaSorting: [[0, 'asc']]
						});
					</script>

				<?php }elseif ($controller[1] == 'add' || $controller[1] == 'edit') { ?>

					<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					<script src="{{ url('/') }}/assets/js/bootstrapValidator.js"></script>
					<script src="{{ url('/') }}/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
					<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					<script>
						jQuery(document).ready(function() {
							Main.init();
						});
					</script>

					@yield('script_validation')
				<?php } ?>
			
			<?php } ?>

			<!-- Weight_classController End -->
			<!-- Evening_rateController Start -->
			
			<?php if($controller[0] == 'Evening_hoursController'){
				if($controller[1] == 'index'){
			?>

					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/bootbox/bootbox.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/select2/select2.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
					<script src="{{ url('/') }}/assets/js/table-data.js"></script>

					<script>
						jQuery(document).ready(function() {
							Main.init();
							TableData.init();
						});
						$('#sample_1').dataTable({
						  aaSorting: [[0, 'asc']]
						});
					</script>

				<?php }elseif ($controller[1] == 'add' || $controller[1] == 'edit') { ?>


					
					<script src="{{ url('/') }}/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
					
					<script src="{{ url('/') }}/assets/js/bootstrapValidator.js"></script>
					<script>
						jQuery(document).ready(function() {
							Main.init();
							jQuery('.time-picker').timepicker();
						});
					</script>

					@yield('script_validation')
				<?php } ?>
			
			<?php } ?>

			<!-- Evening_hoursclassController End -->

			<!-- Holiday_ratesController Start -->
			
			<?php if($controller[0] == 'Holiday_ratesController'){
				if($controller[1] == 'index'){
			?>

					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/bootbox/bootbox.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/select2/select2.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
					<script src="{{ url('/') }}/assets/js/table-data.js"></script>

					<script>
						jQuery(document).ready(function() {
							Main.init();
							TableData.init();
						});
						$('#sample_1').dataTable({
						  aaSorting: [[0, 'asc']]
						});
					</script>

				<?php }elseif ($controller[1] == 'add' || $controller[1] == 'edit') { ?>

					<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					
					<script src="{{ url('/') }}/assets/js/bootstrapValidator.js"></script>
					<script src="{{ url('/') }}/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
					<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					<script>
						jQuery(document).ready(function() {
							Main.init();
							$('.date-picker').datepicker({
					            autoclose: true
					        });
						});
					</script>

					@yield('script_validation')
				<?php } ?>
			
			<?php } ?>

			<!-- Holiday_ratesController End -->

			<!-- PricingController Start -->
			
				<?php if($controller[0] == 'PricingController'){
					if($controller[1] == 'index'){
				?> 

					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/bootbox/bootbox.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/select2/select2.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
					<script type="text/javascript" src="{{ url('/') }}/assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
					<script src="{{ url('/') }}/assets/js/table-data.js"></script>

					<script>
						jQuery(document).ready(function() {
							Main.init();
							TableData.init();
						});
						$('#sample_1').dataTable({
						  aaSorting: [[0, 'asc']]
						});
					</script>

				<?php }elseif ($controller[1] == 'add' || $controller[1] == 'edit') { ?>

					<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					<script src="{{ url('/') }}/assets/js/bootstrapValidator.js"></script>
					<script src="{{ url('/') }}/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
					<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
					<script>
						jQuery(document).ready(function() {
							Main.init();
						});
					</script>

					@yield('script_validation')
				<?php } ?>
			
			<?php } ?>
			
			<!-- PricingController End -->
		<?php } ?>
	</body>
	<!-- end: BODY -->
</html>