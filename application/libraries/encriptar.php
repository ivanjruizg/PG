<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . "/third_party/pass_encriptadas/PasswordHash.php";

/**
 * Created by PhpStorm.
 * User: Ivan Ruiz
 * Date: 18/01/2017
 * Time: 12:21 PM
 */
class Encriptar extends PasswordHash
{
    function __construct(array  $param)
    {
        parent::__construct($param[0], $param[1]);

    }

}