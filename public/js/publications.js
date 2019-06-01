$(document).ready(function(){

	$('#register-new-publication').click(function(){
		$('#modal-register-publication').removeClass('out-display-none');
		$('#background-modal').removeClass('out-display-none');

		$('#summernote').summernote({
			height: "35vh",
			toolbar: [
				['style', ['bold', 'italic', 'underline', 'clear']],
				['font', ['strikethrough']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']]
			]
		});

		$('#title').val('');
		$('#image').val('');
		$('#content').val('');
		$('#id-category option[value=""]').prop('selected', true);
	})

	$('#close-modal-register-publication').click(function(e){
		e.preventDefault();

		$('#summernote').summernote('destroy');

		$('#modal-register-publication').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	});

	$('#register-publication').submit(function(e){
		e.preventDefault();

		var form = document.getElementById('register-publication');
		var formData = new FormData(form);
		var content = $('.note-editable').html();
		formData.append("content", content);

		$.ajax({
			url: `${baseUrl}admin/registerNewPublication`,
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
					searchPublications();
				});
				
			}
		});
	})

})

const deletePublication = idPublication => {
	Swal.fire({
		title: 'Confirmação?',
		text: `Tem certeza que deseja excluir a publicação?`,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sim',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: `${baseUrl}admin/deletePublication`,
				method: 'POST',
				data: {idPublication},
				success: function(jsonResponse){
					var response = JSON.parse(jsonResponse);

					Swal.fire({
						type: response.type,
						title: response.title,
						text: response.message
					}).then(() => {
						searchPublications('');
					})

				}
			});
		}
	})
}