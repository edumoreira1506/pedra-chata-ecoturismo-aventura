$(document).ready(function(){

	$('#close-modal-edit-info').click(function(e){
		e.preventDefault();

		$('#modal-edit-info').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
	})

	$('#edit-info').submit(function(e){
		e.preventDefault();

		var infoId = $('#info-id').val();
		var content = $('#content').val();

		$.ajax({
			url: `${baseUrl}admin/editInfo`,
			method: 'POST',
			data: {infoId, content},
			success: function(jsonResponse){
				var response = JSON.parse(jsonResponse);
				
				Swal.fire({
					type: response.type,
					title: response.title,
					text: response.message
				}).then(() => {
					window.location = window.location.href;
				})
			}
		});
	})

})

const editInfo = infoId => {
	$.ajax({
		url: `${baseUrl}admin/getInfo`,
		method: 'POST',
		data: {infoId},
		success: function(jsonResponse){
			var response = JSON.parse(jsonResponse);

			$('#modal-edit-info').removeClass('out-display-none');
			$('#background-modal').removeClass('out-display-none');

			$('#info-id').val(infoId);
			$('#content').val(response.content);		
		}
	});
}