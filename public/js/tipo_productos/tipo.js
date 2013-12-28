$(document).on('ready',function()
	{
		TipoProducto.init();
	});

var TipoProducto = new (function()
{

	//hacemos referencia al objeto
	var self = this;

	//funcion principal
	this.init = function()
	{

		//cargamos la accion del boton de eliminar
		$('.delete-tipo').on('click', self.validationDelete);

	};


	//boton eliminar
	this.validationDelete = function(e)
	{
		//hacemos referencia al boton
		var $btn = $(e.currentTarget);

		//guardamos el id del boton
		var id = $btn.data('id');

		//confirmamos si esta seguro de eliminar
		if(confirm('Estas seguro de eliminar este registro?'))
		{
			//hacemos submit al form correcto
			$('#form-delete-'+id).submit();
		}

	};

})();