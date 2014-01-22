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
					<li class="active">文章分类添加</li>
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
						文章分类添加
					</h1>
				</div><!-- /.page-header -->
				
				<!-- PAGE CONTENT BEGINS -->
				<div class="articleclassadd">
					<?php 
						echo validation_errors(); 
						echo form_open('admin/articleclassedit');
						
						
						$bFlag = 0;
						if (count($info)) {
							$articleclassinfo = $info;
							$bFlag = 1;
						}
						else {
							$articleclassinfo['id'] = 0;
						}
						
						
					?>
						<fieldset>
						<label>标题</label>
						<input type="text" class="medium-input" id="menutitle" name="menutitle" value="<?php if($bFlag == 1) echo $menuinfo['title']; ?>"></input>
	
						<label>导航</label>
						<select name="parentid" id="parentid" class="small-input" >
							
							<?php 	
								$str = '<option value="0"';
								if($bFlag == 1)
								{
									if ($menuinfo['rootid'] == 0) {
										$str = $str. 'selected="selected"';
									}
								}
								echo $str.'>作为一级导航</option>';
							?>
							
							<?php 
								foreach ($menu as $key=>$value){
									if($bFlag == 1)
									{	
										if ($key == $menuinfo['rootid']) {
											echo '<option value='.$key.' selected="selected">┠'.$value.'</option>';
											continue;
										}
										
									}
									echo '<option value='.$key.'>┠'.$value.'</option>';
								}
							?>
						</select>
						
						<label>转链接</label>
						<input type="text" class="medium-input" id="menulink" name="menulink" value="<?php if($bFlag == 1) echo $menuinfo['link']; ?>"></input>
						
						<label>排序</label>
						<input type="text" class="medium-input" id="menusort" name="menusort" value="<?php if($bFlag == 1) echo $menuinfo['orders']; ?>"></input>
						
						<p>
							<br/>
							<input type="button" class="btn btn-info" name="Add" value="确定" onclick="EditMenu(<?php echo $bFlag; ?>,<?php echo $menuinfo['id'];?>)"></input>
						</p>
						</fieldset>
					</form>							
				</div><!-- /.row -->
				<!-- PAGE CONTENT ENDS -->
				
			</div><!-- /.page-content -->
		</div><!-- /.main-content -->

	</div><!-- /.main-container-inner -->
</div><!-- /.main-container -->

<script src="admin/js/menumgr.js"></script>

<?php include 'footer.php';?>