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
					<li class="active">文章添加</li>
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
						<h4>文章添加</h4>
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
										echo form_open('admin/articleedit');
										
										
										$bFlag = 0;
										if (count($info)) {
											$articleinfo = $info;
											$bFlag = 1;
										}
										else {
											$articleinfo['id'] = 0;
										}
										
										
									?>
										<fieldset>
										<label>标题</label>
										<input type="text" class="medium-input" id="articletitle" name="articletitle" value="<?php if($bFlag == 1) echo $articleinfo['classtitle']; ?>"></input>
					
										<label>导航</label>
										<select name="parentid" id="parentid" class="small-input" >			
											<?php 
												foreach ($articleclass as $key=>$value){
													if($bFlag == 1)
													{	
														if ($key == $articleinfo['classid']) {
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
											<input class="text-input medium-input" type="text" id="thumb" name="thumb" value="<?php if($bFlag == 1) echo $articleinfo['thumb']; ?>" /> 
											<a class="btn_addPic" href="javascript:void(0);"><span><em>+</em>添加图片</span><input class="medium-input" type="file" id="thumb_file" name="thumb_file" onchange="return ajaxFileUpload('thumb_file','thumb','thumb_loading');" /></a>
											<span id="thumb_loading"></span>
										</div>
										
										<label>简介</label>
										<input type="text" class="medium-input" id="articleintro" name="articleintro" value="<?php if($bFlag == 1) echo $articleinfo['intro']; ?>"></input>
										
                                        <label>内容</label>
                                        <textarea id="content" name="content" class="xheditor" rows="12" cols="80" style="width: 80%"></textarea>
                                        <p>
											<br/>
											<input type="button" class="btn btn-info" name="Add" value="确定" onclick="EditArticle(<?php echo $bFlag; ?>,<?php echo $articleinfo['id'];?>)"></input>
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

<script type="text/javascript" src="admin/plugin/xheditor/xheditor-1.2.1.min.js"></script>
<script type="text/javascript" src="admin/plugin/xheditor/xheditor_lang/zh-cn.js"></script>

<script src="admin/js/articlemgr.js"></script>

<?php include 'footer.php';?>