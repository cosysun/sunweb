$("document").ready(function(){
	$(".nav-list li ul li a").click(function(){
		$(this).parent().parent().parent().attr("class", "active");
	});
});