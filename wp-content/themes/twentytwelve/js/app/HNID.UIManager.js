// JavaScript Document
//全局方法整理
/*
HNID.UIManager.toggleSubMenuShowHide() 切换子菜单显示/隐藏



*/

var HNID= HNID||{};

HNID.UIManager=function(){
	//私有属性及方法
	var subMenuIsHidden=true;
	
	return{
		//公共属性及方法开始		
		toggleSubMenuShowHide:function(){
			if(subMenuIsHidden){
					$("#hnid_sub_nav").css("height","auto");
					subMenuIsHidden=false;
				}else{
					$("#hnid_sub_nav").css("height",0);
					subMenuIsHidden=true;	
				}
			},
		hideSubMenu:function(){
			if(!subMenuIsHidden){
				$("#hnid_sub_nav").css("height",0);
				subMenuIsHidden=true;
				}
			}
		//公共属性及方法结束
		}
	}();