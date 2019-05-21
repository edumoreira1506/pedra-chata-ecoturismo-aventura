$(document).ready(function(){

	$('#new-user-form').submit(function(e){
		e.preventDefault();

		var name = $('#name').val();
		var email = $('#email').val();
		var password = $('#password').val();

		$.ajax({
			url: `${baseUrl}admin/createNewUser`,
			method: 'POST',
			data: {name, email, password},
			success: function(jsonResponse){
				var response = JSON.parse(jsonResponse);
				
				if(response.status){
					Swal.fire({
						type: 'success',
						title: 'Sucess',
						text: response.message
					});
				}else{
					Swal.fire({
						type: 'error',
						title: 'Oops..',
						text: response.message
					});
				}
			}
		});

	});

});