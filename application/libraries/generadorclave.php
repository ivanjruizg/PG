<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."/third_party/pass_aleatorias/password_aleatorias.php";

class Generadorclave extends Password_aleatorias
{

    public function __construct() {
        parent::__construct();
    }





}