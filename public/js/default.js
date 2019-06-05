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

	$('#modal-highlight i').click(function(){
		$('#modal-highlight').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
		$('body').removeClass('scroll-block');
	})

	const verification = localStorage.getItem('lastVisit');
	const now = Date.now();
	const dispositiveWidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;

	if(verification == undefined || verification == null || verification == ""){
		localStorage.setItem('lastVisit', now);
		ajaxVisit(dispositiveWidth);
	}else{
		const dateDifference = now - verification;
		if(dateDifference > 604800000){
			localStorage.removeItem('lastVisit');
			ajaxVisit(dispositiveWidth);
			setTimeout(function(){localStorage.setItem('lastVisit', now)}, 2000);
		}
	}

})

const openModalHighlight = idHighlight => {
	$('#modal-highlight').removeClass('out-display-none');
	$('#background-modal').removeClass('out-display-none');
	$('body').addClass('scroll-block');

	$.ajax({
		url: `${baseUrl}site/getHighlight`,
		method: 'POST',
		data: {idHighlight},
		success: function(jsonResponse){				
			var response = JSON.parse(jsonResponse);
			
			$('#title-modal-highlight').html(response.title)
			$('#image-highlight').attr('src', `${baseUrl}public/images/highlights/${response.image_path}`);
			$('#description-modal-highlight').html(response.description);
		}
	});
}

const ajaxVisit = dispositiveWidth => {
	$.ajax({
		url: `${baseUrl}site/visit`,
		method: 'POST',
		data: {dispositiveWidth}
	});
}
