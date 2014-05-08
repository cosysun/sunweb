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
				<div class="row-fluid">
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
								<tbody>
								</tbody>
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

         $("document").ready(function () {
        	 	InitDataTable()
            }); 

         function InitDataTable() {
             $('#sample-table-1').dataTable({
                 "sPaginationType": "full_numbers",
                 "bPaginate": true,
                 "bLengthChange": true,
                 "bFilter": false,
                 "bSort": false,
                 "bInfo": false,
                 "bAutoWidth": true,
                 "bProcessing": true,
                 "bServerSide": true,
                 "bDestroy": true,
                 "iDisplayLength": 5,
                 "aLengthMenu": [[5,25, 50, 100], [5,25, 50, 100]],
                 "oLanguage": {
                     "sLengthMenu": "每页显示 _MENU_ 条记录",
                     "sZeroRecords": "抱歉， 没有找到",
                     "sInfo": "从 _START_ 到 _END_ /共 _TOTAL_ 条数据",
                     "sInfoEmpty": "没有数据",
                     "sInfoFiltered": "(从 _MAX_ 条数据中检索)",
                     "oPaginate": {
                         "sFirst": "首页",
                         "sPrevious": "前一页",
                         "sNext": "后一页",
                         "sLast": "尾页"
                     }
                 },
                 "sAjaxSource": "/sunweb/index.php/admin/articleshow",
				 
				 // 这个是定义 列表的列名称，和显示位置（居中），返回数据的 key 要与这个名称相同，
                 "aoColumns": [
								{
								"mData":null,
								"mRender": function() {return "<input type='checkbox' name='ace_list' class='ace' /> <span class='lbl'/>";},
								"sWidth":"5%",
								"bSortable":false
								},
								{ "mData": "title", "sClass": "center", "sWidth": "50%"},
								{ "mData": "class", "sClass": "center", "sWidth": "30%" },
								{"mData":"id","mRender": function(data){ return '<div class="visible-md visible-lg hidden-sm hidden-xs btn-group"><button class="btn btn-xs btn-info" onclick="location.href='+
					"'/sunweb/index.php/admin/articleadd/"+data+"'"+'"><i class="icon-plus bigger-120"></i></button><button class="btn btn-xs btn-info" onclick="location.href='+
								"'/sunweb/index.php/admin/articleupdate/"+data+"'"+'"><i class="icon-edit bigger-120"></i></button><button class="btn btn-xs btn-danger" onclick="DelArticleClass('+ data +
								' )"><i class="icon-trash bigger-120"></i></button></div>'}, 
								"sWidth":"15%", "bSortable":false }
                               ],
                 "fnServerData": function (sSource, aoData, fnCallback) {
                     $.ajax({
                         "type": "POST",
                         "url": sSource,
                         "dataType": "json",
                         "data": {
                             "aoData": JSON.stringify(aoData)
                         },
                         success: function (resp) {
                             fnCallback(resp);
                         }
                     });
                 }
             });
         }
</script>

<?php include 'footer.php';?>
