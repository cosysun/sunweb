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
					<li class="active">文章列表</li>
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
						文章列表
					</h1>
				</div><!-- /.page-header -->
				
				<!-- PAGE CONTENT BEGINS -->
				<div class="row">
					<div class="col-xs-12">
							<table id="sample-table-1" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>
											<label>
												<input type="checkbox" class="ace" name="check_all" id="check_ace" />
												<span class="lbl"/>
											</label>
										</th>
										<th>标题</th>
										<th>分类</th>
										<th>操作</th>
									</tr>
								</thead>
							</table>
							
							<div class="row">
								<div class="col-sm-6">
									<div class="dataTables_info" id="sample-table-2_info">
										<select name="a">
										<option>操作</option>
										<option value="del">删除</option>
										</select>
										<input class="button" type="submit" name="submit" value="选择操作"/>
										<input type="hidden" name="c" value="articles"/>
									</div>
								</div>
								
								<div class="col-sm-6">
								   <div class="dataTables_paginate paging_bootstrap">
									<div id="Pagination" class="right flickr"></div> 
									</div>
								</div>
							</div>
					</div><!-- /.col -->
					
											
				</div><!-- /.row -->
				<!-- PAGE CONTENT ENDS -->
				
			</div><!-- /.page-content -->
		</div><!-- /.main-content -->

	</div><!-- /.main-container-inner -->
</div><!-- /.main-container -->

<script src="admin/js/articlemgr.js"></script>
<script src="admin/plugin/pagination/jquery.pagination.js"></script>
<link rel="stylesheet" href="admin/plugin/pagination/pagination.css" />	

<script type="text/javascript"> 

         var pageIndex = 0;     //页面索引初始值   
         var pageSize = 10;     //每页显示条数初始化，修改显示条数，修改这里即可   
         $("document").ready(function () {
              InitTable(0);    //Load事件，初始化表格数据，页面索引为0（第一页）
                //分页，PageCount是总条目数，这是必选参数，其它参数都是可选
                $("#Pagination").pagination(<?php echo $MaxSize; ?>, {
                    callback: PageCallback,  //PageCallback() 为翻页调用次函数。
                    prev_text: "« 上一页",
                    next_text: "下一页 »",
                    items_per_page:pageSize,
                    num_edge_entries: 2,       //两侧首尾分页条目数
                    num_display_entries: 6,    //连续分页主体部分分页条目数
                    current_page: pageIndex,   //当前页索引
                    link_to:"/sunweb/index.php/admin/articlelist/menu-articlelist"
                });
                //翻页调用   
                function PageCallback(index, jq) {             
                    InitTable(index);  
                }  
                //请求数据   
                function InitTable(index) {                                  
                    $.ajax({   
                        type: "POST",  
                        dataType: "text",  
                        url: "/sunweb/index.php/admin/articleshow",      //提交到一般处理程序请求数据   
                        data:{'pageIndex':index, 'pageSize':pageSize},          //提交两个参数：pageIndex(页面索引)，pageSize(显示条数)                   
                        success: function(data) {
                        	$('table tbody').remove();        //移除Id为Result的表格里的行，从第二行开始（这里根据页面布局不同页变）   
                            $("#sample-table-1").append(data);             //将返回的数据追加到表格   
                        }  
                    }); 
                }
            }); 
</script>

<?php include 'footer.php';?>
