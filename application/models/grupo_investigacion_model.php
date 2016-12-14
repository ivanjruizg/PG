
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Ing. José Ríos
 * Date: 23/10/2016
 * Time: 3:42 PM
 */
class Grupo_investigacion_model extends CI_Model
{

    function listar(){


        $this->db->select('codigo,nombre');
        $this->db->from('grupos_de_investigacion');
        $reslt = $this->db->get();

        return $reslt->result_array();

    }





}