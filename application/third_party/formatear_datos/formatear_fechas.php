<?php

/**
 * Created by PhpStorm.
 * User: Ivan Ruiz G
 * Date: 24/11/2016
 * Time: 2:04 PM
 */
class Formatear_fechas
{

    function __construct()
    {
    }

    function fechas_español ($fecha) {


                $formato = substr($fecha, 0, 10);
                $numeroDia = date('d', strtotime($formato));
                $dia = date('l', strtotime($formato));
                $mes = date('F', strtotime($formato));
                $anio = date('Y', strtotime($formato));
                $dias_ES = array("Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom");
                $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
                $nombredia = str_replace($dias_EN, $dias_ES, $dia);
                $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                $nombreMes = str_replace($meses_EN, $meses_ES, $mes);



                return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
    }



    function fechas_español2 ($fecha) {


        $formato = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($formato));
        $mes = date('F', strtotime($formato));
        $anio = date('Y', strtotime($formato));
        $meses_ES = array("Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);



        return $numeroDia." de ".$nombreMes.". de ".$anio;
    }



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


    function formatear_fecha($fecha){

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



        return $numeroDia." de ".$nombreMes." de ".$anio;

    }

}