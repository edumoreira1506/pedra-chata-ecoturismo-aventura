$(document).ready(function(){

	$('#search-menu-options').keyup(function(){
		searchMenuOptions(this.value)
	})

	$('#create-new-option-menu').click(function(){
		$('#modal-new-menu-option').removeClass('out-display-none');
		$('#background-modal').removeClass('out-display-none');

		$('#name').val('');
		$('#link').val('');
	});

	$('#close-modal-new-menu-option').click(function(e){
		e.preventDefault();

		$('#modal-new-menu-option').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	});

	$('#close-modal-edit-menu-option').click(function(e){
		e.preventDefault();

		$('#modal-edit-menu-option').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	});

	$('#edit-option-menu').submit(function(e){
		e.preventDefault();

		var name = $('#edit_name').val();
		var link = $('#edit_link').val();
		var idMenuOption = $('#menu-edit-id').val();

		$.ajax({
			url: `${baseUrl}admin/editMenuOption`,
			method: 'POST',
			data: {name, link, idMenuOption},
			success: function(jsonResponse){
				var response = JSON.parse(jsonResponse);
				
				Swal.fire({
					type: response.type,
					title: response.title,
					text: response.message
				}).then(() => {
					searchMenuOptions('');
				});
				
			}
		});
	})

})

function editMenuOption(idMenuOption){
	$.ajax({
		url: `${baseUrl}admin/getMenuOption`,
		method: 'POST',
		data: {idMenuOption},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);

			$('#modal-edit-menu-option').removeClass('out-display-none');
			$('#background-modal').removeClass('out-display-none');

			$('#menu-edit-id').val(idMenuOption);
			$('#edit_name').val(response.name);
			$('#edit_link').val(response.link);
		}
	});
}

function deleteMenuOption(idMenuOption){
	Swal.fire({
		title: 'Confirmação?',
		text: `Tem certeza que deseja excluir esse item do menu?`,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sim',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: `${baseUrl}admin/deleteMenuOption`,
				method: 'POST',
				data: {idMenuOption},
				success: function(jsonResponse){
					var response = JSON.parse(jsonResponse);

					Swal.fire({
						type: response.type,
						title: response.title,
						text: response.message
					}).then(() => {
						searchMenuOptions('');
					})

				}
			});
		}
	})
}

function searchMenuOptions(keyWord){
	$.ajax({
		url: `${baseUrl}admin/searchMenuOptions`,
		method: 'POST',
		data: {keyWord},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);

			var html = '';

			for(i in response.menuOptions){
				html += `
				<tr>
	                <td id="option-menu-${response.menuOptions[i].id_menu}">${response.menuOptions[i].name}</td>
	                <td>
	                    <a href="${response.menuOptions[i].link}">
	                        Conferir
	                    </a>
	                </td>
	                <td>
	                    <button class="btn" title="Editar" onclick="editMenuOption(${response.menuOptions[i].id_menu})" style="font-size:14px;">
	                        <i class="fas fa-edit"></i>
	                    </button>
	                    <button class="btn" title="Excluir" onclick="deleteMenuOption(${response.menuOptions[i].id_menu})" style="font-size:14px;">
	                        <i class="fas fa-trash-alt"></i>
	                    </button>
	                </td>
            	</tr>
				`;
			}

			$('#menu-options-table tbody').html(html);
		}
	});
}