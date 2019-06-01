$(document).ready(function(){

	$('#register-new-image').click(function(){
		$('#modal-register-image').removeClass('out-display-none');
		$('#background-modal').removeClass('out-display-none');

		$('#image').val('');
		$('#description').val('');
		$('#travel option[value=""]').prop('selected', true);
	});

	$('#filter-images').change(function(){
		searchImages(this.value);
	})

	$('#close-modal-register-image').click(function(e){
		e.preventDefault();

		$('#modal-register-image').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	});

	$('#close-modal-edit-image').click(function(e){
		e.preventDefault();

		$('#modal-edit-image').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	})

	$('#register-image').submit(function(e){
		e.preventDefault();

		var form = document.getElementById('register-image');
		var formData = new FormData(form);

		$.ajax({
			url: `${baseUrl}admin/registerNewImage`,
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
					searchImages();
				});
				
			}
		});
	})

	$('#edit-image').submit(function(e){
		e.preventDefault();

		var form = document.getElementById('edit-image');
		var formData = new FormData(form);

		$.ajax({
			url: `${baseUrl}admin/editImage`,
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
					searchImages('');
				});
				
			}
		});
	})

});

const deleteImage = idImage => {
	Swal.fire({
		title: 'Confirmação?',
		text: `Tem certeza que deseja excluir a imagem?`,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sim',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: `${baseUrl}admin/deleteImage`,
				method: 'POST',
				data: {idImage},
				success: function(jsonResponse){
					var response = JSON.parse(jsonResponse);

					Swal.fire({
						type: response.type,
						title: response.title,
						text: response.message
					}).then(() => {
						searchImages();
					})

				}
			});
		}
	})
}

const searchImages = (idTravel = '') => {
	$.ajax({
		url: `${baseUrl}admin/searchImages`,
		method: 'POST',
		data: {idTravel},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);
			var html = '';
			console.log(response)

			for(i in response.images){
				html += `
				<div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                      <div class="font-icon-detail" style="background-image: url(${baseUrl}public/images/images-travel/${response.images[i].image_path});  background-size: cover;">
                      </div>
                      <div class="botoes">
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="editImage(${response.images[i].id_image})">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="deleteImage(${response.images[i].id_image})">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
				`;
			}

			$('#images-travel').html(html);
		}
	});
}

const editImage = idImage => {
	$('#modal-edit-image').removeClass('out-display-none');
	$('#background-modal').removeClass('out-display-none');

	$.ajax({
		url: `${baseUrl}admin/getImage`,
		method: 'POST',
		data: {idImage},
		success: function(jsonResponse){				
			var response = JSON.parse(jsonResponse);
			
			$("#edit-travel").val(response.id_travel);
			$('#id-edit-image').val(response.id_image);
		}
	});
}