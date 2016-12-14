<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Fechas_model extends CI_Model
{



    function formateador($fecha){

        $formato = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($formato));
        $dia = date('l', strtotime($formato));
        $mes = date('F', strtotime($formato));
        $anio = date('Y', strtotime($formato));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);



        return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;

    }




}