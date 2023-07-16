$(document).ready(function(){
	$(document).scroll(function() {
		var scroll = $(document).scrollTop();
		if(scroll > 10){
			$("#scroll_bar").show('400');
		}else{
			$("#scroll_bar").hide('300');
		}
	});
	$("#scroll_bar").on("click",function(){
		$(document).scrollTop(0);
	});
});