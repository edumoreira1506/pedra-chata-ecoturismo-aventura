$(document).ready(function(){

	$('#register-new-travel').click(function(){
		$('#modal-register-travel').removeClass('out-display-none');
		$('#background-modal').removeClass('out-display-none');

		$('#title').val('');
		$('#description').val('');
		$('#price').val('');
		$('#featured-image').val('');
	});

	$('#close-modal-register-travel').click(function(e){
		e.preventDefault();

		$('#modal-register-travel').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	});

	$('#register-travel').submit(function(e){
		e.preventDefault();

		var form = document.getElementById('register-travel');
		var formData = new FormData(form);

		$.ajax({
			url: `${baseUrl}admin/registerNewTravel`,
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
				}).then(() => {
					searchBanners('');
				});
				
			}
		});
	})

});