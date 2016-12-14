$(document).on("ready",main);

function main(){


	$("#login").submit(function(event){
		event.preventDefault();
		$.ajax({
			url:$(this).attr("action"),
			type:$(this).attr("method"),
			data:$(this).serialize(),
			success:function(resp){



				if(resp=="error") {


					$("#password").focus();
					$("#email").addClass("validar");

					$("#error-login").html('<span class="help-inline">  Falló la autentificación: Ingresaste un correo o contraseña incorrecto. </span>');

					$("#password").addClass("validar")


				}else  if (resp=='estudiante inactivo'){

					$("#password").focus();
					$("#email").addClass("validar");

					$("#error-login").html('<span class="help-inline">Estiamado estudiante, debe activar su cuenta desde el correo institucional, <a target="_blank" href="https://accounts.google.com/ServiceLogin?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ltmpl=default&hd=cecar.edu.co&service=mail&sacu=1&rip=1#identifier">Clic aquí para acceder</a></span> <br>');

					$("#password").addClass("validar")

				}else {
					window.location.href=resp;
				}

			}
		});
	});


}
