

<div class="sidebar" id="sidebar">
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success">
				<i class="icon-signal"></i>
			</button>

			<button class="btn btn-info">
				<i class="icon-pencil"></i>
			</button>

			<button class="btn btn-warning">
				<i class="icon-group"></i>
			</button>

			<button class="btn btn-danger">
				<i class="icon-cogs"></i>
			</button>
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div><!-- #sidebar-shortcuts -->

	<ul class="nav nav-list">
		<li id="board">
			<a href="/sunweb/index.php/admin/?c=board">
				<i class="icon-dashboard"></i>
				<span class="menu-text"> 控制台 </span>
			</a>
		</li>

		<li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-edit"></i>
				<span class="menu-text">文章编辑</span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu">
				<li>
					<a href="/sunweb/index.php/admin/articleclassmgr/">
						<i class="icon-double-angle-right"></i>
					文章分类列表</a>
				</li>
				</ul>
		</li>
		
		<li id="menubar">
			<a href="#" class="dropdown-toggle">
				<i class="icon-exchange"></i>
				<span class="menu-text">导航管理</span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu">
				<li id="menubar_list">
					<a href="/sunweb/index.php/admin/menumgr/?c=menubar&a=list">
						<i class="icon-double-angle-right"></i>
					导航列表</a>
				</li>
				<li id="menubar_add">
					<a href="/sunweb/index.php/admin/menuadd/">
						<i class="icon-double-angle-right"></i>
					导航添加</a>
				</li>
			</ul>
		</li>						
	</ul><!-- /.nav-list -->

	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
	</div>

	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script>
	
</div>