$(document).on('ready', function(){

	$('.delete_admin').click(function(){


		if(confirm("Estas seguro de eliminar este Administrador")){
			$('form').submit();
		}

		/*var id = $(this).data('id');
		var usuario = $(this).data('usuario');

		if(confirm("Estas seguro de eliminar este Administrador")){

			$.ajax({
				url: 'admin/eliminar',
				method: 'delete',
				data: 'id='+id+'&usuario='+usuario,
				success: function(data){
					alert("se elimino correctamente");
					location.reload(true);
				}
			});
		}*/
	});
});