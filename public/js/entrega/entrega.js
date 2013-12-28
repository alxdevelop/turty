$(document).on('ready', function(){

	$('.delete_entrega').click(function(){

		if(confirm("¿Estas seguro de eliminar este usuario?"))
		{
			$('form').submit();
		}

	});

});