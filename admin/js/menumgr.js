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

function EditMenu(bFlag, id)
{
	var title = $('#menutitle').val();
	var rootid = $('#parentid').val();
	var link = $('#menulink').val();
	var sort = $('#menusort').val();	
	
	$.ajax({
		type:"POST",
		url:"/sunweb/index.php/admin/menuedit",
		data:{'id':id, 'title':title, 'rootid':rootid, 'link':link, 'sort':sort, 'flag':bFlag},
		dataType:"text",
		cache:false,
		success:
			function(data){
			if(data)
			{
				var strMsg = ""
				if(bFlag)
				{
					strMsg = "更新成功"
					
					setTimeout(function(){location.href = "/sunweb/index.php/admin/menumgr";}, 1000);
				}
				else
				{
					strMsg = "添加成功"
				}
				alert(strMsg);
			}
			else{
				var strMsg = ""
				if(bFlag)
				{
					strMsg = "更新失败"
				}
				else
				{
					strMsg = "添加失败"
				}
				alert(strMsg);
			}
		}
	});
}