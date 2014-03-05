<!DOCTYPE html>
<html lang="en">
  	<base href="<?php echo base_url(); ?>" />
	<head>
  		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<title>控制台 - 后台管理系统</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link href="admin/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="admin/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="admin/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!-- ace styles -->

		<link rel="stylesheet" href="admin/css/ace.min.css" />
		<link rel="stylesheet" href="admin/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="admin/css/ace-skins.min.css" />
		<link rel="stylesheet" href="admin/css/style.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="admin/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="admin/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="admin/js/html5shiv.js"></script>
		<script src="admin/js/respond.min.js"></script>
		<![endif]-->
		
				<!--[if !IE]> -->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='admin/js/jquery-2.0.3.min.js'>"+"<"+"script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='admin/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='admin/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
		</script>
		<script src="admin/js/bootstrap.min.js"></script>
		<script src="admin/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="admin/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="admin/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="admin/js/jquery.ui.touch-punch.min.js"></script>
		<script src="admin/js/jquery.slimscroll.min.js"></script>
		<script src="admin/js/jquery.easy-pie-chart.min.js"></script>
		<script src="admin/js/jquery.sparkline.min.js"></script>
		<script src="admin/js/flot/jquery.flot.min.js"></script>
		<script src="admin/js/flot/jquery.flot.pie.min.js"></script>
		<script src="admin/js/flot/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->

		<script src="admin/js/ace-elements.min.js"></script>
		<script src="admin/js/ace.min.js"></script>
		<script src="admin/plugin/upload/ajaxfileupload.js"></script>
		<script src="admin/js/admin.jquery.configuration.js"></script>
		
		
	</head>

	<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="icon-leaf"></i>
							ACE后台管理系统
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="admin/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎光临,</small>
									Jason
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="icon-cog"></i>
										设置
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-user"></i>
										个人资料
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="#">
										<i class="icon-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>