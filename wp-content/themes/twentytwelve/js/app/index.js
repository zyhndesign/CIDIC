// JavaScript Document

function scrollToTarget(target){
			var top=$(target).offset().top;
			if(top!= undefined){
				TweenLite.killTweensOf(window)
				TweenLite.to(window, 1, {scrollTo:{y:top+10, x:0}});
            }
			
        }


$(document).ready(function(e) {
    //绑定导航点击
	$("#top_nav>ul>li>a").click(function(){
		var target=$(this).attr("href");
		scrollToTarget(target);
		return false;
    });
	
	
	
});