$(document).ready(function(){

	const menuList = $('.site-menu li');
	const activeMenu = menuList[activeLink];
	$(activeMenu).removeClass('active-pro');
	$(activeMenu).addClass('active');

})