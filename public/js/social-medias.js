$(document).ready(function(){

	$('#search-social-medias').keyup(function(){
		searchSocialMedia(this.value)
	})

	$('#register-new-social-media').click(function(){
		$('#modal-register-social-media').removeClass('out-display-none');
		$('#background-modal').removeClass('out-display-none');

		$('#name').val('');
		$('#link').val('');
		$('#icon').val('');
	});

	$('#close-modal-register-social-media').click(function(e){
		e.preventDefault();

		$('#modal-register-social-media').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	})

	$('#close-modal-edit-social-media').click(function(e){
		e.preventDefault();

		$('#modal-edit-social-media').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	})

	$('#register-social-media').submit(function(e){
		e.preventDefault();

		var name = $('#name').val();
		var link = $('#link').val();
		var icon = $('#icon').val();

		$.ajax({
			url: `${baseUrl}admin/registerNewSocialMedia`,
			method: 'POST',
			data: {name, link, icon},
			success: function(jsonResponse){
				var response = JSON.parse(jsonResponse);
				
				Swal.fire({
					type: response.type,
					title: response.title,
					text: response.message
				}).then(() => {
					searchSocialMedia('');
				})
				
			}
		});
	})

	$('#edit-social-media').submit(function(e){
		e.preventDefault();

		var name = $('#edit_name').val();
		var link = $('#edit_link').val();
		var icon = $('#edit_icon').val();
		var idSocialMedia = $('#menu-edit-id').val();

		$.ajax({
			url: `${baseUrl}admin/editSocialMedia`,
			method: 'POST',
			data: {name, link, icon, idSocialMedia},
			success: function(jsonResponse){
				var response = JSON.parse(jsonResponse);
				
				Swal.fire({
					type: response.type,
					title: response.title,
					text: response.message
				}).then(() => {
					searchSocialMedia('');
				});
				
			}
		});
	})

});

function editSocialMedia(idSocialMedia){
	$.ajax({
		url: `${baseUrl}admin/getSocialMedia`,
		method: 'POST',
		data: {idSocialMedia},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);

			$('#modal-edit-social-media').removeClass('out-display-none');
			$('#background-modal').removeClass('out-display-none');

			$('#menu-edit-id').val(idSocialMedia);
			$('#edit_name').val(response.name);
			$('#edit_link').val(response.link);
			$('#edit_icon').val(response.icon);
		}
	});
}

function deleteSocialMedia (idSocialMedia){
	Swal.fire({
		title: 'Confirmação?',
		text: `Tem certeza que deseja excluir essa rede social?`,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sim',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: `${baseUrl}admin/deleteSocialMedia`,
				method: 'POST',
				data: {idSocialMedia},
				success: function(jsonResponse){
					var response = JSON.parse(jsonResponse);

					Swal.fire({
						type: response.type,
						title: response.title,
						text: response.message
					}).then(() => {
						searchSocialMedia('');
					})

				}
			});
		}
	})
}

function searchSocialMedia(keyWord){
	$.ajax({
		url: `${baseUrl}admin/searchSocialMedia`,
		method: 'POST',
		data: {keyWord},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);

			var html = '';
			for(i in response.menuOptions){
				html += `
				<tr>
	                <td>${response.menuOptions[i].name}</td>
	                <td>
	                    <a href="${response.menuOptions[i].link}" target="_blank">
	                        Conferir
	                    </a>
	                </td>
	                <td>
	                    ${response.menuOptions[i].icon}
	                </td>
	                <td>
	                    <button class="btn" title="Editar" onclick="editSocialMedia(${response.menuOptions[i].id_social_media})" style="font-size:14px;">
	                        <i class="fas fa-edit"></i>
	                    </button>
	                    <button class="btn" title="Excluir" onclick="deleteSocialMedia(${response.menuOptions[i].id_social_media})" style="font-size:14px;">
	                        <i class="fas fa-trash-alt"></i>
	                    </button>
	                </td>
            	</tr>
				`;
			}

			$('#social-medias-table tbody').html(html);
		}
	});
}