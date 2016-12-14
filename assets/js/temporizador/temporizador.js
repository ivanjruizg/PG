$(document).on('ready', function () {


    var dominio = 'http://localhost/pg/estudiante/reloj';
     var servidor = $.get(dominio, function(data){

             if(data!="0") {
                 horaServidor = data;
                 iniciarTemporizador(horaServidor);
             }

     });

});

function iniciarTemporizador(horaServidor) {

    var clock = $("#mi-reloj").FlipClock({
        clockFace: 'DailyCounter',
        callbacks: {
            interval: redireccionar
        },
    });

    clock.setTime(horaServidor);
    clock.setCountdown(true);


    function redireccionar() {
        if (clock.getTime() <= 0) {
            window.location.reload();
        }
    }

}