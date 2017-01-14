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

        $this->db->select("correo AS value, CONCAT(nombres, ' ', primer_apellido,' ',segundo_apellido) AS label", FALSE);
        $this->db->like('nombres', $nombres);
        $this->db->or_like('primer_apellido', $nombres);
        $this->db->or_like('segundo_apellido', $nombres);
        $this->db->from('docentes');
        $reslt = $this->db->get();
        return $reslt->result_array();

    }


    function cambiar_clave_de_acceso($clave,$datos){

        if(strcmp($clave,$this->obtener_clave())==0){


            $this->db->where('correo=',$this->session->userdata('correo') );

            $this->db->update("docentes",$datos);

            return $this->db->affected_rows();
        }

        return 0;

    }


    function obtener_clave(){

        $this->db->select("clave");
        $this->db->where('correo=',$this->session->userdata('correo') );
        $this->db->from('docentes');

        $reslt = $this->db->get();

        foreach ($reslt->result_array() as $clave){

            return $clave['clave'];

        }

    }


}