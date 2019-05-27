$(document).ready(function(){

	$('#register-new-highlight').click(function(){
		$('#modal-register-highlight').removeClass('out-display-none');
		$('#background-modal').removeClass('out-display-none');

		$('#title').val('');
		$('#description').val('');
		$('#image').val('');
	});

	$('#close-modal-register-highlight').click(function(e){
		e.preventDefault();

		$('#modal-register-highlight').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	});

	$('#search-highlights').keyup(function(){
		searchHighlights(this.value);
	})

	$('#register-highlight').submit(function(e){
		e.preventDefault();

		var form = document.getElementById('register-highlight');
		var formData = new FormData(form);

		$.ajax({
			url: `${baseUrl}admin/registerNewHighlight`,
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
					searchHighlights('');
				});
				
			}
		});
	})

})

const activeHighlight = idHighlight => {
	$.ajax({
		url: `${baseUrl}admin/changeActiveHighlight`,
		method: 'POST',
		data: {idHighlight, status: 1},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);				
			Swal.fire({
				type: response.type,
				title: response.title,
				text: response.message
			}).then(() => {
				searchHighlights('');
			});
				
		}
	});
}

const inactivateHighlight = idHighlight => {
	$.ajax({
		url: `${baseUrl}admin/changeActiveHighlight`,
		method: 'POST',
		data: {idHighlight, status: 0},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);				
			Swal.fire({
				type: response.type,
				title: response.title,
				text: response.message
			}).then(() => {
				searchHighlights('');
			});
				
		}
	});
}

const searchHighlights = keyWord => {
	$.ajax({
		url: `${baseUrl}admin/searchHighlights`,
		method: 'POST',
		data: {keyWord},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);
			console.log(response);
			var html = '';
			for(i in response.highlights){
				if(response.highlights[i].active == "1"){
					var button = `
					<button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="inactivateHighlight(${response.highlights[i].id_highlight})">
			            <i class="fas fa-times-circle"></i>
			        </button>`;

			        var status = 'Ativo';
				}else{
					var button = `
					<button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="activeHighlight(${response.highlights[i].id_highlight})">
			            <i class="fas fa-check-circle"></i>
			        </button>`;

			        var status = 'Inativo';
				}


				html += `
				<div class="col-md-4">
			        <div class="card card-user">
			          <div class="image">
			            <img src="${baseUrl}public/images/highlights/${response.highlights[i].image_path}" alt="...">
			          </div>
			          <div class="card-body">
			            <div class="author">
			              <img class="avatar border-gray" src="${baseUrl}public/images/highlights/${response.highlights[i].image_path}" alt="...">
			              <h5 class="title">${response.highlights[i].title}</h5>
			              <p class="description">
			                ${status}
			              </p>
			            </div>
			            <p class="description text-center">
			              ${response.highlights[i].description}
			            </p>
			          </div>
			          <hr>
			          <div class="button-container">
			            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="deleteHighlight(${response.highlights[i].id_highlight})">
			              <i class="fas fa-trash-alt"></i>
			            </button>
			            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="editHighlight(${response.highlights[i].id_highlight})">
			              <i class="fas fa-edit"></i>
			            </button>${button}
			          </div>
			        </div>
			    </div>
				`;
			}

			$('#highlights-list').html(html);
		}
	});
}

var deleteHighlight = idHighlight => {
	Swal.fire({
		title: 'Confirmação?',
		text: `Tem certeza que deseja excluir o destaque?`,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sim',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: `${baseUrl}admin/deleteHighlight`,
				method: 'POST',
				data: {idHighlight},
				success: function(jsonResponse){
					var response = JSON.parse(jsonResponse);

					Swal.fire({
						type: response.type,
						title: response.title,
						text: response.message
					}).then(() => {
						searchHighlights('');
					})

				}
			});
		}
	})
}