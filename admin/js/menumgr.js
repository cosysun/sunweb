$("document").ready(function(){
	
});

function DelMenu(title, id)
{
	if(confirm("确定要删除？"))
	{
		$.ajax({
			type:"POST",
			url:"/sunweb/index.php/admin/menudel",
			data:{'title':title, 'id':id},
			dataType:"text",
			cache:false,
			success:
				function(data){
				location.reload();
			}
		});
	}
}

function EditMenu()
{
	var title = $('#menutitle').val();
	var rootid = $('#parentid').val();
	var link = $('#menulink').val();
	var sort = $('#menusort').val();	
	
	$.ajax({
		type:"POST",
		url:"/sunweb/index.php/admin/menuedit",
		data:{'title':title, 'rootid':rootid, 'link':link, 'sort':sort},
		dataType:"text",
		cache:false,
		success:
			function(data){
			if(data)
			{
				alert("添加成功！");
			}
			else{
				alert("添加失败！");
			}
		}
	});
}