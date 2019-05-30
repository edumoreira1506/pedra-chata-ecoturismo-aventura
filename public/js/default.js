$(document).ready(function(){

	const menuList = $('.site-menu li');
	const activeMenu = menuList[activeLink];
	$(activeMenu).removeClass('active-pro');
	$(activeMenu).addClass('active');

	$('#newsletter-form').submit(function(e){

		e.preventDefault();
		var email = $('#newsletter-email').val();

		$.ajax({
			url: `${baseUrl}newsletter/insert`,
			method: 'POST',
			data: {email},
			success: function(jsonResponse){
				var response = JSON.parse(jsonResponse);

				Swal.fire({
					type: response.type,
					title: response.title,
					text: response.message
				})
			}
		});

	});

})