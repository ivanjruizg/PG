
var meses = ["","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];


function fechaActual() {

    var f=new Date();

   return f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear();
}


function fechaEnEspañol(fecha) {



    var f=fecha.split("-");
    return parseInt(f[2])+ " de " + meses[parseInt(f[1])] + " de " + f[0];


}