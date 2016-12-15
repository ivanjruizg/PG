

function iniciarSesion(){

		event.preventDefault();
		$.ajax({
			url:$("#login").attr("action"),
			type:$("#login").attr("method"),
			data:$("#login").serialize(),
			success:function(resp){



				if(resp=="error") {


					$("#password").focus();
					$("#email").addClass("validar");

					$("#error-login").html('<span class="help-inline">  Falló la autentificación: Ingresaste un correo o contraseña incorrecto. </span>');

					$("#password").addClass("validar")


				}else  if (resp=='estudiante inactivo'){

					$("#password").focus();
					$("#email").addClass("validar");

					$("#error-login").html('<span class="help-inline">Estiamado estudiante, debe activar su cuenta desde el correo institucional, <a target="_blank" href="http://mail.google.com/a/cecar.edu.co">Clic aquí para acceder</a></span> <br>');

					$("#password").addClass("validar")

				}else {
					window.location.href=resp;
				}

			}
		});


	return false;
}
