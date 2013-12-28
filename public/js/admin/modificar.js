$(document).on('ready', function(){

	$('#btn_guardar').click(function(){

		var nombre = $('#nombre');
		var email = $('#email');

		if ($.trim(nombre.val()) == '') {
			alert('Por favor ingresa el Nombre completo');
			nombre.focus();
			return false;
		}
		if ($.trim(email.val()) == '') {
			alert('Por favor ingresa el correo electronico');
			email.focus();
			return false;
		}

		$('form').submit();
		
	});


});