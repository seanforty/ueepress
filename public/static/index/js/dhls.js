$(function(){

    var st = 300;
    $('#nav_all1 li').mouseenter(function () {
	$(this).find("span a").css("color","#539fdd");
	$(this).find('span.fr').css("display","none");
	$(this).find('i').removeClass("hidden");
    $(this).find('ul').stop(false, true).fadeIn(st);
	$(this).css("backgroundColor","#fff");

	
    }).mouseleave(function () {
	$(this).find('span.fr').css("display","inline");
	$(this).find('i').addClass("hidden");
	$(this).find("span a").css("color","#777");
        $(this).find('ul').stop(false, true).fadeOut(st);
		$(this).css("backgroundColor","#fff");
    });

	
	
	

	var page = [1, 1, 1];
	var i=10;
	$("span.next").click(function()
	
	{
	var v_width=$(this).siblings(".v_content").width();
	


	var $v_show=$(this).siblings(".v_content").find("div.move");
	
	var idx = parseInt($v_show.attr("index"));
	
	var len=$(this).siblings(".v_content").find("li").length;
	var page_count=Math.ceil(len/i);
	if(!$v_show.is(":animated")){
		if(page[idx] >= page_count)
		{
			$v_show.animate({left:"0px"},"slow");

			page[idx] = 1;
		}
			else
		{
				$v_show.animate({left:"-="+v_width},"show");
				page[idx]++;
		}}
	});




	
	$("span.prev").click(function()
	
	{
		var v_width=$(this).siblings(".v_content").width();
		var $v_show=$(this).siblings(".v_content").find("div.move");
		
		var idx = parseInt($v_show.attr("index"));
		
		var len=$(this).siblings(".v_content").find("li").length;
		var page_count=Math.ceil(len/i);
	if(!$v_show.is(":animated")){
		if(page[idx] <= 1)
		{
			$v_show.animate({left:"-="+v_width*(page_count-1)},"slow");
			page[idx] = page_count;
			
		}else
		{
				$v_show.animate({left:"+="+v_width},"show");
				page[idx]--;
			
		}
	}
	});
	
	
	var page_one=1;
	var i_i=8;
	$("span.next1").click(function()
	
	{
	var v_width1=$(this).siblings(".v_content1").width();
	
	var $v_show1=$(this).siblings(".v_content1").find("ul.unit_list2");
	var len1=$v_show1.find("li").length;
	var page_count1=Math.ceil(len1/i_i);

	if(!$v_show1.is(":animated")){
		if(page_one==page_count1)
		{
			$v_show1.animate({left:"0px"},"slow");
			page_one=1;
		}
			else
		{
				$v_show1.animate({left:"-="+v_width1},"show");
				page_one++;
		}}
	});
	
	$("span.prev1").click(function()
	
	{
		var v_width1=$(this).siblings(".v_content1").width();
		var $v_show1=$(this).siblings(".v_content1").find("ul.unit_list2");
		var len1=$v_show1.find("li").length;
		var page_count1=Math.ceil(len1/i_i);
	if(!$v_show1.is(":animated")){
		if(page_one==1)
		{
			$v_show1.animate({left:"-="+v_width1*(page_count1-1)},"slow");
			page_one=page_count1;
			
		}else
		{
				$v_show1.animate({left:"+="+v_width1},"show");
				page_one--;
			
		}
	}
	});
 
});