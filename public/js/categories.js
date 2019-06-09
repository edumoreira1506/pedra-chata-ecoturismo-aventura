$(document).ready(function(){

	$('#search-categories').keyup(function(){
		searchCategories(this.value);
	})

	$('#create-new-category').click(function(){
		$('#modal-new-category').removeClass('out-display-none');
		$('#background-modal').removeClass('out-display-none');

		$('#name').val('');
		$('#description').val('');
	})

	$('#close-modal-new-category').click(function(e){
		e.preventDefault();

		$('#modal-new-category').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	})

	$('#close-modal-edit-category').click(function(e){
		e.preventDefault();

		$('#modal-edit-category').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	})

	$('#new-category').submit(function(e){
		e.preventDefault();

		var name = $('#name').val();
		var description = $('#description').val();

		$.ajax({
			url: `${baseUrl}admin/registerNewCategory`,
			method: 'POST',
			data: {name, description},
			success: function(jsonResponse){
				var response = JSON.parse(jsonResponse);
				
				Swal.fire({
					type: response.type,
					title: response.title,
					text: response.message
				}).then(() => {
					searchCategories();
				})
				
			}
		});
	})

	$('#edit-category').submit(function(e){
		e.preventDefault();

		var idCategory = $('#edit-id-category').val();
		var name = $('#edit-name').val();
		var description = $('#edit-description').val();

		$.ajax({
			url: `${baseUrl}admin/editCategory`,
			method: 'POST',
			data: {idCategory, name, description},
			success: function(jsonResponse){
				var response = JSON.parse(jsonResponse);
				
				Swal.fire({
					type: response.type,
					title: response.title,
					text: response.message
				}).then(() => {
					searchCategories();
				});
				
			}
		});
	})

})

const searchCategories = (keyWord = '') => {
	$.ajax({
		url: `${baseUrl}admin/searchCategories`,
		method: 'POST',
		data: {keyWord},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);
			var html = '';
			for(i in response.categories){
				html += `
				<tr>
	                <td>${response.categories[i].name}</td>
	                <td>${response.categories[i].description}</td>
	                <td>
		                <button class="btn" title="Editar" onclick="editCategory(${response.categories[i].id_category})" style="font-size:14px;">
		                  	<i class="fas fa-edit"></i>
		                </button>
		                <button class="btn" title="Excluir" onclick="deleteCategory(${response.categories[i].id_category})" style="font-size:14px;">
		                  	<i class="fas fa-trash-alt"></i>
		                </button>
	                </td>
            	</tr>
				`;
			}

			$('#categories-table tbody').html(html);
		}
	});
}

const deleteCategory = idCategory => {
	Swal.fire({
		title: 'Confirmação?',
		text: `Tem certeza que deseja excluir essa categoria?`,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sim',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: `${baseUrl}admin/deleteCategory`,
				method: 'POST',
				data: {idCategory},
				success: function(jsonResponse){
					var response = JSON.parse(jsonResponse);

					Swal.fire({
						type: response.type,
						title: response.title,
						text: response.message
					}).then(() => {
						searchCategories();
					})

				}
			});
		}
	})
}

const editCategory = idCategory => {
	$.ajax({
		url: `${baseUrl}admin/getCategory`,
		method: 'POST',
		data: {idCategory},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);

			$('#modal-edit-category').removeClass('out-display-none');
			$('#background-modal').removeClass('out-display-none');

			$('#edit-id-category').val(idCategory);
			$('#edit-name').val(response.name);		
			$('#edit-description').val(response.description);		
		}
	});
}