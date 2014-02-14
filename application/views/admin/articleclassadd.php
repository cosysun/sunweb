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
				
				<!-- PAGE CONTENT BEGINS -->
				<div class="widget-box transparent" id="recent-box">
					<div class="widget-header"> 
						<h4>文章分类添加</h4>
						<div class="widget-toolbar no-border">
							<ul class="nav nav-tabs" id="recent-tab">
							<li class="active"><a data-toggle="tab" href="#tab1">基本信息</a></li>
							<li><a data-toggle="tab" href="#tab2">扩展信息</a></li>
							</ul>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">
							<div class="tab-content">
								<div id="tab1" class="tab-pane active">
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
										<input type="text" class="medium-input" id="articleclasstitle" name="articleclasstitle" value="<?php if($bFlag == 1) echo $articleclassinfo['title']; ?>"></input>
					
										<label>导航</label>
										<select name="parentid" id="parentid" class="small-input" >
											
											<?php 	
												$str = '<option value="0"';
												if($bFlag == 1)
												{
													if ($articleclassinfo['rootid'] == 0) {
														$str = $str. 'selected="selected"';
													}
												}
												echo $str.'>作为一级分类</option>';
											?>
											
											<?php 
												foreach ($articleclass as $key=>$value){
													if($bFlag == 1)
													{	
														if ($key == $articleclassinfo['rootid']) {
															echo '<option value='.$key.' selected="selected">┠'.$value.'</option>';
															continue;
														}
														
													}
													echo '<option value='.$key.'>┠'.$value.'</option>';
												}
											?>
										</select>
										<label>缩略图</label>
										<div id="uploadem">
											<input class="text-input medium-input" type="text" id="thumb" name="thumb" value="<?php if($bFlag == 1) echo $articleclassinfo['thumb']; ?>" /> 
											<a class="btn_addPic" href="javascript:void(0);"><span><em>+</em>添加图片</span><input class="medium-input" type="file" id="thumb_file" name="thumb_file" onchange="return ajaxFileUpload('thumb_file','thumb','thumb_loading');" /></a>
											<span id="thumb_loading"></span>
										</div>
										
										<label>转链接</label>
										<input type="text" class="medium-input" id="articleclasslink" name="articleclasslink" value="<?php if($bFlag == 1) echo $articleclassinfo['link']; ?>"></input>
										
										<label>排序</label>
										<input type="text" class="medium-input" id="articleclasssort" name="articleclasssort" value="<?php if($bFlag == 1) echo $articleclassinfo['orders']; ?>"></input>
										
										<p>
											<br/>
											<input type="button" class="btn btn-info" name="Add" value="确定" onclick="Editarticleclass(<?php echo $bFlag; ?>,<?php echo $articleclassinfo['id'];?>)"></input>
										</p>
										</fieldset>
									</form>							
								</div><!-- /.row -->
								</div>
								
								<div id="tab2" class="tab-pane active">
								</div>
							</div>
							
						</div>
					</div>
				</div>

				
				<!-- PAGE CONTENT ENDS -->
				
			</div><!-- /.page-content -->
		</div><!-- /.main-content -->

	</div><!-- /.main-container-inner -->
</div><!-- /.main-container -->

<script src="admin/js/articleclassmgr.js"></script>

<?php include 'footer.php';?>