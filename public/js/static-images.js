$(document).ready(function(){

	$('#close-modal-edit-image').click(function(e){
		e.preventDefault();

		$('#modal-edit-image').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	})

	$('#edit-image').submit(function(e){
		e.preventDefault();

		var form = document.getElementById('edit-image');
		var formData = new FormData(form);

		$.ajax({
			url: `${baseUrl}admin/editStaticImage`,
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
					window.location = window.location.href;
				});
			}
		});
	})

});

const editImage = idImage => {
	$('#modal-edit-image').removeClass('out-display-none');
	$('#background-modal').removeClass('out-display-none');
	$('#id-edit-image').val(idImage);
}