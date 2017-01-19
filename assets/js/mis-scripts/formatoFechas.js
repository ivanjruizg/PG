
var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];


function fechaActual() {

    var f=new Date();

   return f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear();
}


function fechaEnEspañol(fecha) {

    var f=new Date(fecha);

    return f.getDate()+1 + " de " + meses[f.getMonth()] + " de " + f.getFullYear();



}