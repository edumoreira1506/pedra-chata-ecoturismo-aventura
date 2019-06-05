$(document).ready(function(){
	var counterPost = 10;

	$('#load-posts').click(function(){
		$(this).html('<i class="fa fa-spinner fa-spin"></i>  Carregando');

		$.ajax({
			url: `${baseUrl}blog/getMorePosts`,
			method: 'POST',
			data: {counterPost},
			success: function(jsonResponse){	
				counterPost += 10;
				var response = JSON.parse(jsonResponse);

				if(response.length != 0){
					var html = $('#publications-list').html();

					for(i in response){
						var arrayPostName = response[i].title.split(' ');
						var postUrl = arrayPostName.join('-');

						var arrayCategoryName = response[i].name.split(' ');
						var categoryUrl = arrayCategoryName.join('-');

						html += 
						`
						<div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
					        <div class="h-entry">
					          <img src="${baseUrl}public/images/publications/${response[i].image_path}" alt="Image" class="img-fluid">
					          <h2 class="font-size-regular"><a href="${baseUrl}blog/post/${postUrl}">${response[i].title}</a></h2>
					          <div class="meta mb-4">${response[i].publication_date}<span class="mx-2">&bullet;</span><a href="${baseUrl}blog/categorias/${categoryUrl}">${response[i].name}</a></div>
					          <p>${response[i].content.substr(0, 400)}</p>
					        </div> 
					    </div>
						`;
					}

					$('#publications-list').html(html);
					$('#load-posts').html('Carregar mais posts');
				}else{
					$('#load-posts').html('Não há mais posts');
					$('#load-posts').attr("disabled", true);
				}
			}
		});
	})

})