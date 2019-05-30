$(document).ready(function(){

	$('#search-travels').keyup(function(){
		searchTravels(this.value);
	});

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

	$('#close-modal-edit-travel').click(function(e){
		e.preventDefault();

		$('#modal-edit-travel').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	})

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
					searchTravels();
				});
				
			}
		});
	})

	$('#edit-travel').submit(function(e){
		e.preventDefault();

		var form = document.getElementById('edit-travel');
		var formData = new FormData(form);

		$.ajax({
			url: `${baseUrl}admin/editTravel`,
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
					searchTravels();
				});
				
			}
		});
	})

});

const searchTravels = (keyWord = '') => {
	$.ajax({
		url: `${baseUrl}admin/searchTravels`,
		method: 'POST',
		data: {keyWord},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);

			var html = '';
			for(i in response.travels){
				html += `
				<div class="col-md-4">
			        <div class="card card-user">
			          <div class="image">
			            <img src="${baseUrl}public/images/featured-images-travels/${response.travels[i].featured_image}" alt="...">
			          </div>
			          <div class="card-body">
			            <div class="author">
			              <a href="#">
			                <img class="avatar border-gray" src="${baseUrl}public/images/featured-images-travels/${response.travels[i].featured_image}" alt="...">
			                <h5 class="title">${response.travels[i].title}</h5>
			              </a>
			              <p class="description">
			                R$${response.travels[i].price}
			              </p>
			            </div>
			            <p class="description text-center">
			              ${response.travels[i].description}
			            </p>
			          </div>
			          <hr>
			          <div class="button-container">
			            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="deleteTravel(${response.travels[i].id_travel})">
			              <i class="fas fa-trash-alt"></i>
			            </button>
			            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="editTravel(${response.travels[i].id_travel})">
			              <i class="fas fa-edit"></i>
			            </button>
			          </div>
			        </div>
			     </div>
				`;
			}

			$('#travels-list').html(html);
		}
	});
}

const deleteTravel  = idTravel => {
	Swal.fire({
		title: 'Confirmação?',
		text: `Tem certeza que deseja excluir esse passeio?`,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sim',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: `${baseUrl}admin/deleteTravel`,
				method: 'POST',
				data: {idTravel},
				success: function(jsonResponse){
					var response = JSON.parse(jsonResponse);

					Swal.fire({
						type: response.type,
						title: response.title,
						text: response.message
					}).then(() => {
						searchTravels('');
					})

				}
			});
		}
	})
}

const editTravel = idTravel => {
	$.ajax({
		url: `${baseUrl}admin/getTravel`,
		method: 'POST',
		data: {idTravel},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);

			$('#modal-edit-travel').removeClass('out-display-none');
			$('#background-modal').removeClass('out-display-none');

			$('#edit-title').val(response.title);
			$('#edit-description').val(response.description);
			$('#edit-price').val(response.price);
			$('#edit-id-travel').val(idTravel);
		}
	});
}