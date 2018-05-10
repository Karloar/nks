$(document).ready(function(){
	// nav
	//移入显示
	$(".nav-item-a").mouseover(function(){
		//隐藏其他
		$(".nav-submenu").hide();
		//显示当前
		$(this).next().show();
	});
	//移出隐藏
	$(".nav-submenu").mouseleave(function(){
		$(this).hide();
	});
	// block
	$('.block-sub-title-item').hover(function(){
		//content处理
		var cateContentClass = $(this).attr('data-cate')+'-content';
		var curContentId = $(this).attr('data-title')+'-content';
		$('.'+cateContentClass).hide();
		$('#'+curContentId).show();
		//active处理
		$("[data-cate="+$(this).attr('data-cate')+"]").removeClass('block-sub-title-item-selected');
		$(this).addClass('block-sub-title-item-selected');
	});

});