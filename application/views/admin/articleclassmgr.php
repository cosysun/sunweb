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
					<li class="active">文章分类列表</li>
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
						文章分类列表
					</h1>
				</div><!-- /.page-header -->
				
				<!-- PAGE CONTENT BEGINS -->
				<div class="row">
					<div class="col-xs-12">
							<table id="sample-table-1" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>标题</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									
									<?php 
									$ArticleArray = $ArticleData[0];
									$SubArticleArray = $ArticleData[1];							
									foreach ($ArticleArray as $ArticleKey=>$ArticleValue){
										echo '<tr>';
										echo '<td>'.$ArticleValue.'</td>';
										echo '<td>
											<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
												<button class="btn btn-xs btn-info" onclick="location.href='."'/sunweb/index.php/admin/articleclassadd/".$ArticleKey."'".'">
													<i class="icon-plus bigger-120"></i>
												</button>
											    <button class="btn btn-xs btn-info" onclick="location.href='."'/sunweb/index.php/admin/articleclassupdate/".$ArticleKey."'".'">
											        <i class="icon-edit bigger-120"></i>
											    </button>
											    <button class="btn btn-xs btn-danger" onclick="DelArticleClass('.$ArticleKey.' )">
											        <i class="icon-trash bigger-120"></i>
											    </button>
											</div>
										</td>';
										echo '</tr>';

										
										foreach ($SubArticleArray[$ArticleKey] as $SubArticleValue)
										{
											foreach ($SubArticleValue as $id=>$value)
											{
												echo '<tr>';
												echo '<td>&nbsp&nbsp&nbsp&nbsp'.$value.'</td>';
												echo '<td>
												<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
												    <button class="btn btn-xs btn-info" onclick="location.href='."'/sunweb/index.php/admin/articleclassadd/".$id."'".'">
												        <i class="icon-plus bigger-120"></i>
												    </button>
													<button class="btn btn-xs btn-info" onclick="location.href='."'/sunweb/index.php/admin/articleclassupdate/".$id."'".'">
												        <i class="icon-edit bigger-120"></i>
												    </button>
												    <button class="btn btn-xs btn-danger" onclick="DelArticleClass('.$id.')">
												        <i class="icon-trash bigger-120"></i>
												    </button>
												</div>
											</td>';
												echo '</tr>';
											}
										}
									}
								?>
																	
								</tbody>
							</table>
					</div><!-- /.col -->
					
											
				</div><!-- /.row -->
				<!-- PAGE CONTENT ENDS -->
				
			</div><!-- /.page-content -->
		</div><!-- /.main-content -->

	</div><!-- /.main-container-inner -->
</div><!-- /.main-container -->

<script src="admin/js/articlemgr.js"></script>

<?php include 'footer.php';?>
