<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Ing. José Ríos
 * Date: 23/10/2016
 * Time: 3:42 PM
 */
class Carrera_Model extends CI_Model
{

    function listar(){

        $this->db->select('codigo,nombre');
        $this->db->from('programas');
        $reslt = $this->db->get();

        return $reslt->result_array();

    }





}