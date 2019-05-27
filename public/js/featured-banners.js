$(document).ready(function(){

	$('#register-new-banner').click(function(){
		$('#modal-register-banner').removeClass('out-display-none');
		$('#background-modal').removeClass('out-display-none');

		$('#title').val('');
		$('#description').val('');
		$('#button-content').val('');
		$('#button-link').val('');
		$('#image').val('');
	});

	$('#close-modal-register-banner').click(function(e){
		e.preventDefault();

		$('#modal-register-banner').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	});

	$('#close-modal-edit-banner').click(function(e){
		e.preventDefault();

		$('#modal-edit-banner').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	});

	$('#search-banners').keyup(function(){
		searchBanners(this.value)
	})

	$('#register-featured-banner').submit(function(e){
		e.preventDefault();

		var form = document.getElementById('register-featured-banner');
		var formData = new FormData(form);

		$.ajax({
			url: `${baseUrl}admin/registerNewBanner`,
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
					searchBanners('');
				});
				
			}
		});
	})

	$('#edit-featured-banner').submit(function(e){
		e.preventDefault();

		var form = document.getElementById('edit-featured-banner');
		var formData = new FormData(form);

		$.ajax({
			url: `${baseUrl}admin/editBanner`,
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
					searchBanners('');
				});
				
			}
		});
	})

});

const searchBanners = keyWord => {
	$.ajax({
		url: `${baseUrl}admin/searchBanners`,
		method: 'POST',
		data: {keyWord},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);
			var html = '';
			for(i in response.banners){
				html += `
				<div class="col-md-4">
			        <div class="card card-user">
			          <div class="image">
			            <img src="${baseUrl}public/images/featured-banners/${response.banners[i].image_path}" alt="...">
			          </div>
			          <div class="card-body">
			            <div class="author">
			              <a href="${response.banners[i].button_link}">
			                <img class="avatar border-gray" src="${baseUrl}public/images/featured-banners/${response.banners[i].image_path}" alt="...">
			                <h5 class="title">${response.banners[i].button_content}</h5>
			              </a>
			              <p class="description">
			                ${response.banners[i].title}
			              </p>
			            </div>
			            <p class="description text-center">
			              ${response.banners[i].description}
			            </p>
			          </div>
			          <hr>
			          <div class="button-container">
			            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="deleteBanner(${response.banners[i].id_banner})">
			              <i class="fas fa-trash-alt"></i>
			            </button>
			            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg" onclick="editBanner(${response.banners[i].id_banner})">
			              <i class="fas fa-edit"></i>
			            </button>
			          </div>
			        </div>
			    </div>
				`;
			}

			$('#banners-list').html(html);
		}
	});
}

const editBanner = idBanner => {
	$('#id-banner').val(idBanner);

	$.ajax({
		url: `${baseUrl}admin/getBanner`,
		method: 'POST',
		data: {idBanner},
		success: function(jsonResponse){				
			var response = JSON.parse(jsonResponse);

			$('#modal-edit-banner').removeClass('out-display-none');
			$('#background-modal').removeClass('out-display-none');

			$('#edit-title').val(response.title);
			$('#edit-description').val(response.description);
			$('#edit-button-content').val(response.button_content);
			$('#edit-button-link').val(response.button_link);
		}
	});
}

const deleteBanner = idBanner => {
	Swal.fire({
		title: 'Confirmação?',
		text: `Tem certeza que deseja excluir o banner?`,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sim',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: `${baseUrl}admin/deleteBanner`,
				method: 'POST',
				data: {idBanner},
				success: function(jsonResponse){
					var response = JSON.parse(jsonResponse);

					Swal.fire({
						type: response.type,
						title: response.title,
						text: response.message
					}).then(() => {
						searchBanners('');
					})

				}
			});
		}
	})
}