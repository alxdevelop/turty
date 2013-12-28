$(document).on('ready',function(){

	$('.drop_ref').click(function(){

		if(confirm('¿Esta seguro de eliminar esta Referencia Personal?')){
			$('form').submit();
		}
	});
});