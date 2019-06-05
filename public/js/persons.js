$(document).ready(function(){

	$('#search-persons').keyup(function(){
		searchPersons(this.value)
	})

	$('#register-new-person').click(function(){
		$('#modal-new-person').removeClass('out-display-none');
		$('#background-modal').removeClass('out-display-none');

		$('#name').val('');
		$('#description').val('');
	})

	$('#close-modal-edit-person').click(function(e){
		e.preventDefault();

		$('#modal-edit-person').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	})

	$('#close-modal-new-person').click(function(e){
		e.preventDefault();

		$('#modal-new-person').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	})

	$('#new-person').submit(function(e){
		e.preventDefault();

		var form = document.getElementById('new-person');
		var formData = new FormData(form);

		$.ajax({
			url: `${baseUrl}admin/registerNewPerson`,
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
					searchPersons();
				});
				
			}
		});
	})

	$('#edit-person').submit(function(e){
		e.preventDefault();

		var form = document.getElementById('edit-person');
		var formData = new FormData(form);

		$.ajax({
			url: `${baseUrl}admin/editPerson`,
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
					searchPersons();
				});
				
			}
		});
	})

})

const searchPersons = (keyWord = '') => {
	$.ajax({
		url: `${baseUrl}admin/searchPersons`,
		method: 'POST',
		data: {keyWord},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);
			var html = '';

			for(i in response.persons){
				html += `
				<div class="col-md-4">
		          <div class="card card-user">
		            <div class="image">
		              <img src="${baseUrl}public/images/persons/${response.persons[i].image_path}" alt="...">
		            </div>
		            <div class="card-body">
		              <div class="author">
		                <a href="#">
		                  <img class="avatar border-gray" src="${baseUrl}public/images/persons/${response.persons[i].image_path}" alt="...">
		                  <h5 class="title">${response.persons[i].name}</h5>
		                </a>
		              </div>
		              <p class="description text-center">
		                ${response.persons[i].description}
		              </p>
		            </div>
		            <hr>
		            <div class="button-container">
		              <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="deletePerson(${response.persons[i].id_person})">
		                <i class="fas fa-trash-alt"></i>
		              </button>
		              <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="editPerson(${response.persons[i].id_person})">
		                <i class="fas fa-edit"></i>
		              </button>
		            </div>
		          </div>
		        </div>
				`;
			}

			$('#persons-list').html(html);
		}
	});
}

const deletePerson = idPerson => {
	Swal.fire({
		title: 'Confirmação?',
		text: `Tem certeza que deseja excluir essa pessoa da equipe?`,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sim',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: `${baseUrl}admin/deletePerson`,
				method: 'POST',
				data: {idPerson},
				success: function(jsonResponse){
					var response = JSON.parse(jsonResponse);

					Swal.fire({
						type: response.type,
						title: response.title,
						text: response.message
					}).then(() => {
						searchPersons();
					})

				}
			});
		}
	})
}

const editPerson = idPerson => {
	$.ajax({
		url: `${baseUrl}admin/getPerson`,
		method: 'POST',
		data: {idPerson},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);

			$('#modal-edit-person').removeClass('out-display-none');
			$('#background-modal').removeClass('out-display-none');

			$('#id-person').val(idPerson);
			$('#edit-name').val(response.name);		
			$('#edit-facebook').val(response.facebook);		
			$('#edit-instagram').val(response.instagram);	
			$('#edit-image').val('');	
			$('#edit-description').val(response.description);		
		}
	});
}