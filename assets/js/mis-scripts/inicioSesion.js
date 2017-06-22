

function iniciarSesion(){


	$('#loading').addClass("glyphicon glyphicon-refresh glyphicon-refresh-animate");


		event.preventDefault();
		$.ajax({
			url:$("#login").attr("action"),
			type:$("#login").attr("method"),
			data:$("#login").serialize(),
			success:function(resp){




				if(resp=="error") {


					$("#password").focus();
					$("#email").addClass("validar");


					$("#error-login").html('<div class="alert alert-danger"> <strong>¡Fallo en la autenticación!</strong>  Ingresaste un correo o contraseña incorrecto. </div>');

					$("#password").addClass("validar");

					$('#loading').removeClass("glyphicon glyphicon-refresh glyphicon-refresh-animate");


				}else  if (resp=='estudiante inactivo'){

					$("#password").focus();
					$("#email").addClass("validar");

					$("#error-login").html('<div class="alert alert-info"><strong>¡Cuenta sin activar!</strong>  Estimado estudiante, debe activar su cuenta desde el correo institucional, <a target="_blank" class="alert-link" href="http://mail.google.com/a/cecar.edu.co">Clic aquí para acceder</a></div> <br>');

					$("#password").addClass("validar")


					$('#loading').removeClass("glyphicon glyphicon-refresh glyphicon-refresh-animate");


				}else {
					window.location.href=resp;
				}

			}
		});


	return false;
}
