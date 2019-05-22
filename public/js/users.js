$(document).ready(function(){

	$('#search-users').keyup(function(){
		searchUsers(this.value)
	})

	$('#create-new-user').click(function(){
		$('#modal-new-user').removeClass('out-display-none');
		$('#background-modal').removeClass('out-display-none');

		$('#name').val('');
		$('#email').val('');
		$('#password').val('');
	});

	$('#close-modal-user').click(function(e){
		e.preventDefault();

		$('#modal-new-user').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	})

});

function deleteUser(userId){
	var name = $(`#user-name-${userId}`).html();
	name = name.split(' ');
	name = name[0];

	Swal.fire({
		title: 'Confirmação?',
		text: `Tem certeza que deseja excluir o usuário ${name}?`,
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sim',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: `${baseUrl}admin/deleteUser`,
				method: 'POST',
				data: {userId},
				success: function(jsonResponse){
					var response = JSON.parse(jsonResponse);

					Swal.fire({
						type: response.type,
						title: 'Sucesso',
						text: response.message
					}).then(() => {
						searchUsers('');
					})

				}
			});
		}
	})
}

function searchUsers(keyWord){
	$.ajax({
		url: `${baseUrl}admin/searchUsers`,
		method: 'POST',
		data: {keyWord},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);

			var html = '';
			for(i in response.users){
				html += `
				<tr>
                	<td id="user-name-${response.users[i].id_user}">${response.users[i].name}</td>
	                <td>
	                    <a href="mailto:${response.users[i].email}">
	                    	${response.users[i].email}
	                    </a>
	                </td>
	                <td>
	                    <button class="btn" title="Excluir" onclick="deleteUser(${response.users[i].id_user})" style="font-size:14px;">
	                        <i class="fas fa-trash-alt"></i>
	                    </button>
	                </td>
            	</tr>
				`;
			}

			$('#users-table tbody').html(html);
		}
	});
}