$(document).ready(function(){

	$('#register-new-banner').click(function(){
		$('#modal-register-banner').removeClass('out-display-none');
		$('#background-modal').removeClass('out-display-none');

		$('#title').val('');
		$('#description').val('');
		$('#button-content').val('');
		$('#button-link').val('');
		$('#image').val('');
	});

	$('#close-modal-register-banner').click(function(e){
		e.preventDefault();

		$('#modal-register-banner').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	});

	$('#register-featured-banner').submit(function(e){
		e.preventDefault();

		var form = document.getElementById('register-featured-banner');
		var formData = new FormData(form);

		$.ajax({
			url: `${baseUrl}admin/registerNewBanner`,
			method: 'POST',
			data: formData,
			dataType: 'json',
			processData: false,  
			contentType: false,
			success: function(jsonResponse){				
				Swal.fire({
					type: jsonResponse.type,
					title: jsonResponse.title,
					text: jsonResponse.message
				})

				//.then(() => {
				// 	searchSocialMedia('');
				// })
				
			}
		});
	})

});