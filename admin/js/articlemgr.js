$("document").ready(function(){
	$("#check_ace").click(function(){
	     $("input[name='ace_list']").prop("checked", $("#check_ace").prop('checked'));
	});
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

function EditArticle(bFlag, id)
{
	var title = $('#articletitle').val();
	var rootid = $('#parentid').val();
	var imgpath = $('#thumb').val();
	var intro = $('#articleintro').val();
	var content = $('.xheditor').val();	
	
	$.ajax({
		type:"POST",
		url:"/sunweb/index.php/admin/articleedit",
		data:{'id':id, 'title':title, 'rootid':rootid, 'intro':intro, 'content':content, 'img':imgpath, 'flag':bFlag},
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
					
					setTimeout(function(){location.href = "/sunweb/index.php/admin/articlemgr/menu-articlelist";}, 1000);
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