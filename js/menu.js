$("document").ready(function(){
	$(".menu_main .menu_a").click(function(){
		$("#menu_current").removeAttr("id");
		$(this).attr("id", "menu_current");
	});
});