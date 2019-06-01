$(document).ready(function(){

	$('#register-new-testimony').click(function(){

		$('#modal-register-testimony').removeClass('out-display-none');
		$('#background-modal').removeClass('out-display-none');

		$('#person-name').val('');
		$('#image').val('');
		$('#testimony').val('');
	})

	$('#search-testimonies').keyup(function(){
		searchTestimonies(this.value);
	})

	$('#close-modal-edit-testimony').click(function(e){
		e.preventDefault();

		$('#modal-edit-testimony').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	})

	$('#close-modal-register-testimony').click(function(e){
		e.preventDefault();

		$('#modal-register-testimony').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	});

	$('#register-testimony').submit(function(e){
		e.preventDefault();

		var form = document.getElementById('register-testimony');
		var formData = new FormData(form);

		$.ajax({
			url: `${baseUrl}admin/registerNewTestimony`,
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
					searchTestimonies();
				});
				
			}
		});
	})

	$('#edit-testimony').submit(function(e){
		e.preventDefault();

		var form = document.getElementById('edit-testimony');
		var formData = new FormData(form);

		$.ajax({
			url: `${baseUrl}admin/editTestimony`,
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
					searchTestimonies('');
				});
				
			}
		});
	})

})

const searchTestimonies = (keyWord = '') => {
	$.ajax({
		url: `${baseUrl}admin/searchTestimonies`,
		method: 'POST',
		data: {keyWord},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);
			var html = '';

			for(i in response.testimonies){

				html += `
				<div class="col-md-4">
		          <div class="card card-user">
		            <div class="image">
		              <img src="${baseUrl}public/images/testimonies/${response.testimonies[i].image_path}" alt="...">
		            </div>
		            <div class="card-body">
		              <div class="author">
		                <a href="#">
		                  <img class="avatar border-gray" src="${baseUrl}public/images/testimonies/${response.testimonies[i].image_path}" alt="...">
		                  <h5 class="title">${response.testimonies[i].person_name}</h5>
		                </a>
		              </div>
		              <p class="description text-center">
		                ${response.testimonies[i].testimony}
		              </p>
		            </div>
		            <hr>
		            <div class="button-container">
		              <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="deleteTestimony(${response.testimonies[i].id_testimony})">
		                <i class="fas fa-trash-alt"></i>
		              </button>
		              <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="editTestimony(${response.testimonies[i].id_testimony})">
		                <i class="fas fa-edit"></i>
		              </button>
		            </div>
		          </div>
		        </div>
				`;
			}

			$('#testimonies-list').html(html);
		}
	});
}

const deleteTestimony = idTestimony => {
	Swal.fire({
		title: 'Confirmação?',
		text: `Tem certeza que deseja excluir o depoimento?`,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sim',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: `${baseUrl}admin/deleteTestimony`,
				method: 'POST',
				data: {idTestimony},
				success: function(jsonResponse){
					var response = JSON.parse(jsonResponse);

					Swal.fire({
						type: response.type,
						title: response.title,
						text: response.message
					}).then(() => {
						searchTestimonies('');
					})

				}
			});
		}
	})
}

const editTestimony = idTestimony => {
	$('#modal-edit-testimony').removeClass('out-display-none');
	$('#background-modal').removeClass('out-display-none');

	$('#edit-person-name').val('');
	$('#edit-image').val('');
	$('#id-testimony').val('');
	$('#edit-testimony-textarea').val('');

	$.ajax({
		url: `${baseUrl}admin/getTestimony`,
		method: 'POST',
		data: {idTestimony},
		success: function(jsonResponse){				
			var response = JSON.parse(jsonResponse);

			$('#edit-testimony-id').val(response.id_testimony);
			$('#edit-testimony-textarea').val(response.testimony);
			$('#edit-person-name').val(response.person_name);
		}
	});
}