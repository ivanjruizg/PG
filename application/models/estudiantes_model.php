<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Estudiantes_Model extends  CI_Model {



    function consultar($nombres){



        $this->db->select("correo AS value, CONCAT(nombres, ' ', primer_apellido,' ',segundo_apellido) AS label", FALSE);


        $this->db->where('correo!=',$this->session->userdata('correo') );

        $this->db->like('nombres', $nombres);
        $this->db->or_like('primer_apellido', $nombres);
        $this->db->or_like('segundo_apellido', $nombres);

        $this->db->from('estudiantes');
        $reslt = $this->db->get();
        return $reslt->result_array();


    }

    function cambiar_clave_de_acceso($clave,$datos){

        if(strcmp($clave,$this->optener_clave())==0){


            $this->db->where('correo=',$this->session->userdata('correo') );

            $this->db->update("estudiantes",$datos);

        }




    }

    function optener_clave(){

        $this->db->select("clave");
        $this->db->where('correo=',$this->session->userdata('correo') );
        $this->db->from('estudiantes');

        $reslt = $this->db->get();

        foreach ($reslt->result_array() as $clave){

            return $clave['clave'];

        }

    }

}