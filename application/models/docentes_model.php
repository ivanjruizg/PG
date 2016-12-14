<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Ing. José Ríos
 * Date: 31/10/2016
 * Time: 4:21 PM
 */
class Docentes_Model extends  CI_Model {

    function consultar($nombres){

        $this->db->select("correo AS label, CONCAT(nombres, ' ', primer_apellido,' ',segundo_apellido,' - ',correo) AS value", FALSE);
        $this->db->like('nombres', $nombres);
        $this->db->or_like('primer_apellido', $nombres);
        $this->db->or_like('segundo_apellido', $nombres);
        $this->db->from('docentes');
        $reslt = $this->db->get();
        return $reslt->result_array();

    }

}