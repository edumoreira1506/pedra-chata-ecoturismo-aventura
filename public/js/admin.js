$(document).ready(function(){

	const menuList = $('#sidebar-wrapper ul li');
	const activeMenu = menuList[active];
	$(activeMenu).removeClass('active-pro');
	$(activeMenu).addClass('active');

})