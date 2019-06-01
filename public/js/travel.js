$(document).ready(function(){

	$('#modal-images i').click(function(){
		$('#modal-images').addClass('out-display-none');
		$('#background-modal').addClass('out-display-none');
		$('body').removeClass('scroll-block');
	})

})

const openModalImages = idImage => {
	$('#modal-images').removeClass('out-display-none');
	$('#background-modal').removeClass('out-display-none');
	$('body').addClass('scroll-block');

	var counter;
	var items = $('.images-items-modal');

	for(counter = 0; counter < items.length; counter++){
		if(items[counter].id == `image-carousel-${idImage}`){
			var correct = counter;
			counter = items.length + 1;
		}
	}

	$("#modal-carousel").trigger("to.owl.carousel", correct);
}