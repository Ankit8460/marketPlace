{{--*/ $base_url = url('/').'/admin/' /*--}}

		
		<?php
		
		$current_url = explode("/", str_replace($base_url, '', URL::current()));
		
		if(count($current_url) == 5){
			$main_menu = 'home';
			$sub_menu = 'home';
		}else{
			$main_menu = isset($current_url[0]) ? $current_url[0] : '';
			$sub_menu = isset($current_url[1]) ? $current_url[1] : '';
		}
		
		?>
	<div class="widget stay-on-collapse" id="widget-sidebar">
        <nav role="navigation" class="widget-body">
			<ul class="acc-menu">
				<li class="nav-separator"><span>Navigation</span></li>
				<li><a href="index.html"><i class="fa fa-home"></i><span>Dashboard</span><span class="badge badge-teal">2</span></a></li>
				<li><a href="../angular/app"><i class="fa fa-external-link"></i><span>Angular</span></a></li>
				<li><a href="javascript:;"><i class="fa fa-columns"></i><span>Layout</span></a>
					<ul class="acc-menu">
						<li><a href="layout-grids.html">Grid Scaffolding</a></li>
						<li><a href="layout-static-leftbar.html">Static Sidebar</a></li>
						<li><a href="layout-sidebar-scroll.html">Scroll Sidebar</a></li>
						<li><a href="layout-horizontal.html">Horizontal Nav</a></li>
						<li><a href="layout-boxed.html">Boxed</a></li>	
					</ul>
				</li>

				<li><a href="javascript:;"><i class="fa fa-flask"></i><span>UI Kit</span></a>
					<ul class="acc-menu">
						<li><a href="ui-typography.html">Typography</a></li>
						<li><a href="ui-buttons.html">Buttons</a></li>
						<li><a href="ui-modals.html">Modal</a></li>
		                <li><a href="ui-progress.html">Progress</a></li>
						<li><a href="ui-paginations.html">Paginations</a></li>
						<li><a href="ui-breadcrumbs.html">Breadcrumbs</a></li>
						<li><a href="ui-labelsbadges.html">Labels &amp; Badges</a></li>
		                <li><a href="ui-alerts.html">Alerts</a></li>
		                <li><a href="ui-tabs.html">Tabs</a></li>
		                <li><a href="ui-wells.html">Wells</a></li>
		                <li><a href="ui-icons-fontawesome.html">FontAwesome Icons</a></li>
		                <li><a href="ui-icons-themify.html">Themify Icons</a></li>
						<li><a href="ui-helpers.html">Helpers</a></li>
		        		<li><a href="ui-imagecarousel.html">Images &amp; Carousel</a></li>
					</ul>
				</li>

		        <li><a href="javascript:;"><i class="fa fa-random"></i><span>Components</span></a>
		        	<ul class="acc-menu">
		        		<li><a href="ui-tiles.html">Tiles</a></li>
		        		<li><a href="custom-skylo.html">Page Progress</a></li>
		        		<li><a href="custom-bootbox.html">Bootbox</a></li>
		        		<li><a href="custom-pines.html">Pines Notification</a></li>
		        		<li><a href="custom-pulsate.html">Pulsate</a></li>
						<li><a href="custom-knob.html">jQuery Knob</a></li>
						<li><a href="custom-ionrange.html">Ion Range Slider</a></li>
						<li><a href="ui-panels.html">Panels</a></li>
		        	</ul>
		        </li>
				
				<li><a href="javascript:;"><i class="fa fa-pencil"></i><span>Forms</span></a>
					<ul class="acc-menu">
						<li><a href="ui-forms.html">Form Layout</a></li>
						<li><a href="form-components.html">Form Components</a></li>
						<li><a href="form-pickers.html">Pickers</a></li>
						<li><a href="form-wizard.html">Form Wizard</a></li>
						<li><a href="form-validation.html">Form Validation</a></li>
						<li><a href="form-masks.html">Form Masks</a></li>
						<li><a href="form-dropzone.html">Dropzone Uploader</a></li>
						<li><a href="form-summernote.html">Summernote</a></li>
						<li><a href="form-markdown.html">Markdown Editor</a></li>
						<li><a href="form-xeditable.html">Inline Editor</a></li>
						<li><a href="form-gridforms.html">Grid Forms</a></li>
					</ul>
				</li>

				<li><a href="javascript:;"><i class="fa fa-table"></i><span>Tables</span></a>
					<ul class="acc-menu">
						<li><a href="ui-tables.html">Basic Tables</a></li>
						<li><a href="tables-responsive.html">Responsive Tables</a></li>
						<li><a href="tables-editable.html">Editable Tables</a></li>
						<li><a href="tables-data.html">Data Tables</a></li>
						<li><a href="tables-fixedheader.html">Fixed Header Tables</a></li>
					</ul>
				</li>
				
				<li><a href="javascript:;"><i class="fa fa-area-chart"></i><span>Analytics</span></a>
					<ul class="acc-menu">
						<li><a href="charts-flot.html">Flot</a></li>
						<li><a href="charts-sparklines.html">Sparklines</a></li>
						<li><a href="charts-morris.html">Morris.js</a></li>
						<li><a href="charts-easypiechart.html">Easy Pie Chart</a></li>
					</ul>
				</li>

			</ul>
		</nav>
    </div>
    
