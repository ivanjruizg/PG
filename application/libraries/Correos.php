<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . "/third_party/correos/EnviarCorreos.php";

/**
 * Created by PhpStorm.
 * User: Ivan Ruiz
 * Date: 18/01/2017
 * Time: 12:21 PM
 */
class Correos extends EnviarCorreos
{
    function __construct()
    {
        parent::__construct();

    }

}