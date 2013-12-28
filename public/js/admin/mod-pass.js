$(document).on('ready', function(){

	$('#btn_guardar').click(function(){

		var pass = $('#pass');
		var repass = $('#repass');

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

		$('form').submit();
		
	});


});