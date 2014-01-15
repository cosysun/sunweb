<?php include 'header.php';?>


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
					<li class="active">导航栏添加</li>
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
						导航栏添加
					</h1>
				</div><!-- /.page-header -->
				
				<!-- PAGE CONTENT BEGINS -->
				<div class="menuadd">
					<form>
						<fieldset>
						<label>标题</label>
						<input type="text" class="medium-input" id="menutitle" name="menutitle" value=""></input>
	
						<label>导航</label>
						<select name="parentid" class="small-input"></select>
						
						<label>转链接</label>
						<input type="text" class="medium-input" id="menulink" name="menulink" value=""></input>
						
						<label>排序</label>
						<input type="text" class="medium-input" id="menusort" name="menusort" value="0"></input>
						
						<p>
							<br/>
							<input type="submit" class="btn btn-info" name="submit" value="确定"></input>
						</p>
						</fieldset>
					</form>							
				</div><!-- /.row -->
				<!-- PAGE CONTENT ENDS -->
				
			</div><!-- /.page-content -->
		</div><!-- /.main-content -->

	</div><!-- /.main-container-inner -->
</div><!-- /.main-container -->


<?php include 'footer.php';?>