$(document).ready(function(){

	$('#contact-form').submit(function(e){
		e.preventDefault();

		var name = $('#name').val();
		var email = $('#email').val();
		var message = $('#message').val();

		$.ajax({
			url: `${baseUrl}contato/registerNewContact`,
			method: 'POST',
			data: {name, email, message},
			success: function(jsonResponse){
				var response = JSON.parse(jsonResponse);
				
				Swal.fire({
					type: response.type,
					title: response.title,
					text: response.message
				})
				
			}
		})
	})

});