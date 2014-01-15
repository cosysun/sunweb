<?php include 'header.php'; ?>


<div class="main-container" id="main-container">
	<script type="text/javascript">
try{ace.settings.check('main-container' , 'fixed')}catch(e){}
</script>

<div class="main-container-inner">
	<a class="menu-toggler" id="menu-toggler" href="#">
		<span class="menu-text"></span>
	</a>
	
	<?php include 'navlist.php';?>

		<div class="main-content">
			<div class="breadcrumbs" id="breadcrumbs">
				<script type="text/javascript">
					try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
				</script>

				<ul class="breadcrumb">
					<li>
						<i class="icon-home home-icon"></i>
						<a href="/sunweb/index.php/admin">首页</a>
					</li>
					<li class="active">控制台</li>
				</ul><!-- .breadcrumb -->

				<div class="nav-search" id="nav-search">
					<form class="form-search">
						<span class="input-icon">
							<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
							<i class="icon-search nav-search-icon"></i>
						</span>
					</form>
				</div><!-- #nav-search -->
			</div>

			<div class="page-content">
				<div class="page-header">
					<h1>
						控制台
					</h1>
				</div><!-- /.page-header -->
				
				<!-- PAGE CONTENT BEGINS -->
				<div class="row">
					<div class="col-xs-12">

						<div class="alert alert-block alert-success">
							<button type="button" class="close" data-dismiss="alert">
								<i class="icon-remove"></i>
							</button>

							<i class="icon-ok green"></i>

							欢迎使用
							<strong class="green">
								Ace后台管理系统
								<small>(v1.2)</small>
							</strong>
							,轻量级好用的后台管理系统模版.	
						</div>

					</div><!-- /.col -->
					
					<div class="col-xs-12">
						<a href="#" class="btn btn-white btn-lg btn-shortcut">
							<img src="admin/images/icons/pencil_48.png" />
							<span>添加文章</span>
						</a>
								
						<a href="#" class="btn btn-white btn-lg btn-shortcut">
							<img src="admin/images/icons/paper_content_pencil_48.png" />
							<span>管理文章</span>
						</a>
						
						<a href="#" class="btn btn-white btn-lg btn-shortcut">
							<img src="admin/images/icons/image_add_48.png" />
							<span>添加广告</span>
						</a>
								
						<a href="#" class="btn btn-white btn-lg btn-shortcut">
							<img src="admin/images/icons/clock_48.png" />
							<span>基本设置</span>
						</a>
						
						<a href="#" class="btn btn-white btn-lg btn-shortcut">
							<img src="admin/images/icons/comment_48.png" />
							<span>日志管理</span>
						</a>																			
					</div>
					
					<div class="col-xs-12">
						<h3 class="header smaller lighter red">系统信息</h3>
						<div class="table-responsive">
							<table id="sample-table-1" class="table table-striped table-cs">
								<tbody>
									<tr>
										<td>程序版本</td>
										<td>ACE后台管理系统</td>
									</tr>
									<tr>
										<td>操作系统</td>
										<td><?php echo php_uname('s');?></td>
									</tr>
									<tr>
										<td>网站域名/IP</td>
										<td><?php echo GetHostByName($_SERVER['SERVER_NAME']);?></td>
									</tr>
									<tr>
										<td>服务器解译引擎</td>
										<td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
									</tr>
									<tr>
										<td>PHP</td>
										<td><?php echo 'PHP'.PHP_VERSION;?></td>
									</tr>
									<tr>
										<td>服务器时间</td>
										<td><?php echo date("Y-m-d H:i:m");?></td>
									</tr>																						
								</tbody>
							</table>
						</div>
					</div>
											
				</div><!-- /.row -->
				<!-- PAGE CONTENT ENDS -->
				
			</div><!-- /.page-content -->
		</div><!-- /.main-content -->

	</div><!-- /.main-container-inner -->
</div><!-- /.main-container -->

<?php include 'footer.php';?>

