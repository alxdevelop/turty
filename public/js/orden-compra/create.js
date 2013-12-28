$(document).on('ready', function(){

	$('.calendar').datepicker();

	$('.new_pedido').click(function(){

		$('#form-pedido').clone().appendTo("#mas_pedidos");
	

	});

	function insertVencimiento()
	{

		var dias = parseInt($('#dias_vigencia').val());
		
		if(dias != '' && !isNaN(dias))
			{
				var fecha = new Date();

				fecha.setDate(fecha.getDate() + dias);

				var dia = fecha.getDate();
				var mes = fecha.getMonth() + 1;
				var ano = fecha.getFullYear();
				
				$('#fecha_vencimiento').val(mes+'/'+dia+'/'+ano);
				
			}

	}

	insertVencimiento();
	

	$('#dias_vigencia').focusout(function()
		{
			if($(this).val() != '' && !isNaN($(this).val()))
			{
				var fecha = new Date();

				fecha.setDate(fecha.getDate() + parseInt($(this).val()));

				var dia = fecha.getDate();
				var mes = fecha.getMonth() + 1;
				var ano = fecha.getFullYear();
				
				$('#fecha_vencimiento').val(mes+'/'+dia+'/'+ano);
				
			}
		});

});