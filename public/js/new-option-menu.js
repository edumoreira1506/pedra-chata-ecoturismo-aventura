$(document).ready(function(){

	$('#new-option-menu').submit(function(e){
		e.preventDefault();

		var name = $('#name').val();
		var link = $('#link').val();

		$.ajax({
			url: `${baseUrl}admin/createNewOptionMenu`,
			method: 'POST',
			data: {name, link},
			success: function(jsonResponse){
				var response = JSON.parse(jsonResponse);
				
				Swal.fire({
					type: response.type,
					title: 'Sucesso',
					text: response.message
				}).then(() => {
					searchMenuOptions('');
				})
				
			}
		});

	});

});