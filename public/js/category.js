$(document).ready(function(){
	const categoryNameFunction = () => {
		var categoryName = window.location.href.split('/');
		categoryName = categoryName[categoryName.length - 1];
		categoryName = categoryName.split('-');
		categoryName = categoryName.join(' ');
		return categoryName;
	}
	var counterPost = 10;
	const categoryName = categoryNameFunction();

	$('#load-more-posts').click(function(){
		$(this).html('<i class="fa fa-spinner fa-spin"></i>  Carregando');


		$.ajax({
			url: `${baseUrl}blog/getMorePostsCategory`,
			method: 'POST',
			data: {counterPost, categoryName},
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
					$('#load-more-posts').html('Carregar mais posts');
				}else{
					$('#load-more-posts').html('Não há mais posts');
					$('#load-more-posts').attr("disabled", true);
				}
			}
		});
	})

})