$(document).ready(function(){

	$('#search-services').keyup(function(){
		searchServices(this.value);
	})

	$('#create-new-service').click(function(){
		$('#modal-register-service').removeClass('out-display-none');
		$('#background-modal').removeClass('out-display-none');

		$('#title').val('');
		$('#description').val('');
		$('#icon').val('');
	});

	$('#close-modal-register-service').click(function(e){
		e.preventDefault();

		$('#modal-register-service').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	});

	$('#close-modal-edit-service').click(function(e){
		e.preventDefault();

		$('#modal-edit-service').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	});

	$('#register-service').submit(function(e){
		e.preventDefault();

		var form = document.getElementById('register-service');
		var formData = new FormData(form);

		$.ajax({
			url: `${baseUrl}admin/registerNewService`,
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
					searchServices();
				});
				
			}
		});
	})

	$('#edit-service').submit(function(e){
		e.preventDefault();

		var form = document.getElementById('edit-service');
		var formData = new FormData(form);

		$.ajax({
			url: `${baseUrl}admin/editService`,
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
					searchServices();
				});
			}
		});
	})

})

const searchServices = (keyWord = '') => {
	$.ajax({
		url: `${baseUrl}admin/searchServices`,
		method: 'POST',
		data: {keyWord},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);
			console.log(response);

			var html = '';
			for(i in response.services){
				html += `
				<tr>
	                <td id="service-name-${response.services[i].id_service}">${response.services[i].title}</td>
	                <td>
	                  ${response.services[i].description}
	                </td>
	                <td>
	                 ${response.services[i].icon}
	                </td>
	                <td>
	                    <button class="btn" title="Excluir" onclick="deleteService(${response.services[i].id_service})" style="font-size:14px;">
	                        <i class="fas fa-trash-alt"></i>
	                    </button>
	                    <button class="btn" title="Editar" onclick="editService(${response.services[i].id_service})" style="font-size:14px;">
	                        <i class="fas fa-edit"></i>
	                    </button>
	                </td>
	            </tr>
				`;
			}

			$('#services-table tbody').html(html);
		}
	});
}

const deleteService  = idService => {
	Swal.fire({
		title: 'Confirmação?',
		text: `Tem certeza que deseja excluir esse serviço?`,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sim',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: `${baseUrl}admin/deleteService`,
				method: 'POST',
				data: {idService},
				success: function(jsonResponse){
					var response = JSON.parse(jsonResponse);

					Swal.fire({
						type: response.type,
						title: response.title,
						text: response.message
					}).then(() => {
						searchServices();
					})

				}
			});
		}
	})
}

const editService = idService => {
	$.ajax({
		url: `${baseUrl}admin/getService`,
		method: 'POST',
		data: {idService},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);

			$('#modal-edit-service').removeClass('out-display-none');
			$('#background-modal').removeClass('out-display-none');

			$('#edit-title').val(response.title);
			$('#edit-description').val(response.description);
			$('#edit-icon').val(response.icon);
			$('#edit-id-service').val(idService);
		}
	});
}