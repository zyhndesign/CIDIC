// JavaScript Document

$(document).ready(function(e) {

	
	//绑定子菜单点击相关事件
	$("#hnid_expand_menu_btn").on("click",function(evt){
		HNID.UIManager.toggleSubMenuShowHide();
		evt.preventDefault();
		evt.stopPropagation();
		})
	$("#hnid_sub_nav").on("click",function(evt){
		evt.stopPropagation();
		})
	$(document).on("click",function(evt){
		HNID.UIManager.hideSubMenu()
		})
	
	
	
	
});