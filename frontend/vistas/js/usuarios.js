/*=============================================
VALIDAR EL REGISTRO DE USUARIO
=============================================*/

function registroUsuario(){

	/*=============================================
	VALIDAR EL REGISTRO DE USUARIO
	=============================================*/

	var nombre =$("#regUsuario").val();

	if (nombre != "") {

		var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/

		if (!expresion.test(nombre)) {

			$("#regUsuario").parent().before('<div class ="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')


		}

	}else{

		$("#regUsuario").parent().before('<div class ="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;

	}

	/*=============================================
	VALIDAR EL EMAIL
	=============================================*/

	var email =$("#regEmail").val();

	if (email != "") {

		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if (!expresion.test(email)) {

			$("#regEmail").parent().before('<div class ="alert alert-warning"><strong>ERROR:</strong> Escriba correctamente el correo electrónico</div>')


		}

	}else{

		$("#regEmail").parent().before('<div class ="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;

	}

	/*=============================================
	VALIDAR EL CONTRASEÑA
	=============================================*/

	var password =$("#regPassword").val();

	if (password != "") {

		var expresion = /^[a-zA-Z0-9]*$/;

		if (!expresion.test(password)) {

			$("#regPassword").parent().before('<div class ="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')


		}

	}else{

		$("#regPassword").parent().before('<div class ="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;

	}

	/*=============================================
	VALIDAR EL REGISTRO DE USUARIO
	=============================================*/

	var politicas = $("#regPoliticas:checked").val();

	if (politicas != "on") {

		$("#regPoliticas").parent().before('<div class ="alert alert-warning"><strong>ATENCIÓN:</strong> Debe aceptar nuestras condiciones de uso y políticas de privacidad</div>')
		
		return false;

	}

	return true;

}