$(document).on('ready', function(){

	$('#btn_guardar').click(function(){

		var usuario = $('#usuario');
		var pass = $('#pass');
		var repass = $('#repass');
		var nombre = $('#nombre');
		var email = $('#email');

		if ($.trim(usuario.val()) == '') {
			alert('Por favor ingresa el Username');
			usuario.focus();
			return false;
		}
		if($.trim(pass.val()) == ''){
			alert('Por favor ingresa la Contraseña');
			pass.focus();
			return false;
		}
		if($.trim(repass.val()) == ''){
			alert('Por favor ingresa la Contraseña nuevamente');
			repass.focus();
			return false;
		}
		if($.trim(pass.val()) != $.trim(repass.val())){
			alert("La contraseña debe ser igual");
			pass.val('');
			repass.val('');
			pass.focus();
			return false;
		}
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