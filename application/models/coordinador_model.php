<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Ing. José Ríos
 * Date: 31/10/2016
 * Time: 4:21 PM
 */
class Coordinador_Model extends  CI_Model {


    function cambiar_clave_de_acceso($clave,$datos){

        if(strcmp($clave,$this->optener_clave())==0){


            $this->db->where('correo=',$this->session->userdata('correo') );

            $this->db->update("docentes",$datos);

            return $this->db->affected_rows();
        }

        return 0;

    }


    function optener_clave(){

        $this->db->select("clave");
        $this->db->where('correo=',$this->session->userdata('correo') );
        $this->db->from('coordinadores_investigacion');

        $reslt = $this->db->get();

        foreach ($reslt->result_array() as $clave){

            return $clave['clave'];

        }

    }


}