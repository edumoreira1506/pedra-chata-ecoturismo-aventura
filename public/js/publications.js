$(document).ready(function(){

	$('#search-publications').keyup(function(){
		searchPublications(this.value);
	})

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

	$('#close-modal-edit-publication').click(function(e){
		e.preventDefault();

		$('#edit-summernote').summernote('destroy');
		$('#modal-edit-publication').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');	
	})

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

	$('#edit-publication').submit(function(e){
		e.preventDefault();

		var form = document.getElementById('edit-publication');
		var formData = new FormData(form);
		var content = $('.note-editable').html();
		formData.append("content", content);

		$.ajax({
			url: `${baseUrl}admin/editPublication`,
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

const searchPublications = keyWord => {
	$.ajax({
		url: `${baseUrl}admin/searchPublications`,
		method: 'POST',
		data: {keyWord},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);

			var html = '';
			for(i in response.publications){
				html += `
					<div class="col-md-4">
			          <div class="card card-user">
			            <div class="image">
			              <img src="${baseUrl}public/images/publications/${response.publications[i].image_path}" alt="...">
			            </div>
			            <div class="card-body">
			              <div class="author">
			                <a href="#">
			                  <img class="avatar border-gray" src="${baseUrl}public/images/publications/${response.publications[i].image_path}" alt="...">
			                  <h5 class="title">${response.publications[i].title}</h5>
			                </a>
			              </div>
			              <p class="description text-center">
			                ${response.publications[i].content.substring(0,400)}
			              </p>
			            </div>
			            <hr>
			            <div class="button-container">
			              <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="deletePublication(${response.publications[i].id_publication})">
			                <i class="fas fa-trash-alt"></i>
			              </button>
			              <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="editPublication(${response.publications[i].id_publication})">
			                <i class="fas fa-edit"></i>
			              </button>
			            </div>
			          </div>
			        </div>
				`;
			}

			$('#publications-list').html(html);
		}
	});
}

const editPublication = idPublication => {
	$('#edit-summernote').summernote({
		height: "35vh",
		toolbar: [
			['style', ['bold', 'italic', 'underline', 'clear']],
			['font', ['strikethrough']],
			['fontsize', ['fontsize']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']]
		]
	});

	$.ajax({
		url: `${baseUrl}admin/getPublication`,
		method: 'POST',
		data: {idPublication},
		success: function(jsonResponse){	
			var response = JSON.parse(jsonResponse);

			$('#edit-publication-id').val(idPublication);
			$('#edit-title').val(response.title);
			$('#edit-id-category option[value="' + response.id_category + '"]').prop('selected', true);
			$('.note-editable').html(response.content);

			$('#modal-edit-publication').removeClass('out-display-none');
			$('#background-modal').removeClass('out-display-none');
		}
	});
}