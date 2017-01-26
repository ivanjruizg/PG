<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."/third_party/formatear_datos/formatear_fechas.php";

class Formateador_fechas extends Formatear_fechas
{

    function __construct()
    {
        parent::__construct();
    }


}