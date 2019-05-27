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
				
				Swal.fire({
					type: response.type,
					title: response.title,
					text: response.message
				}).then(() => {
					searchUsers('');
				});
				
			}
		});

	});

});