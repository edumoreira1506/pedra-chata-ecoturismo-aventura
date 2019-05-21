$(document).ready(function(){

	$('#login').submit(function(e){
		e.preventDefault();

		var email = $('#email').val();
		var password = $('#password').val();

		$.ajax({
			url: `${baseUrl}admin/login`,
			method: 'POST',
			data: {email, password},
			success: function(jsonResponse){
				var response = JSON.parse(jsonResponse);
				if(response.status){
					window.location.href = `${baseUrl}admin`;
				}else{
					Swal.fire({
						type: response.type,
						title: 'Sucesso',
						text: response.message
					});
				}
			}
		});
	})

})