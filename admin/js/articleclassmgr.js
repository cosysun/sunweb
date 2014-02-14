$("document").ready(function(){
	
});

function DelArticleClass(id)
{
	if(confirm("确定要删除？"))
	{
		$.ajax({
			type:"POST",
			url:"/sunweb/index.php/admin/ArticleClassdel",
			data:{'id':id},
			dataType:"text",
			cache:false,
			global:false,
			success:
				function(data){
				location.reload();
			}
		});
	}
}

function Editarticleclass(bFlag, id)
{
	var title = $('#articleclasstitle').val();
	var rootid = $('#parentid').val();
	var imgpath = $('#thumb').val();
	var link = $('#articleclasslink').val();
	var sort = $('#articleclasssort').val();	
	
	$.ajax({
		type:"POST",
		url:"/sunweb/index.php/admin/articleclassedit",
		data:{'id':id, 'title':title, 'rootid':rootid, 'link':link, 'sort':sort, 'img':imgpath, 'flag':bFlag},
		dataType:"text",
		cache:false,
		global:false,
		success:
			function(data){
			if(data)
			{
				var strMsg = ""
				if(bFlag)
				{
					strMsg = "更新成功"
					
					setTimeout(function(){location.href = "/sunweb/index.php/admin/articleclassmgr/menu-articleclasslist";}, 1000);
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