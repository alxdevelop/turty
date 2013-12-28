$(document).on('ready', function(){

	$('.eliminar_dist').click(function(){

		

		if(confirm("Estas seguro de eliminar el Distribuidor")){

			$('form').submit();
		}
	});
});