<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inscripcion_Model extends CI_Model
{



    function registrar($datos){

        $this->db->insert("estudiantes",$datos);

        return $this->db->affected_rows();
    }


    function consultar($codigo_activacion){



        $this->db->where("codigo_activacion", $codigo_activacion);
        $this->db->select('correo,nombres');
        $this->db->from('estudiantes');
        $reslt = $this->db->get();


        return $reslt->result_array();
    }


    function activar($correo){

        $datos = array(

            "activo" =>1


        );

        $this->db->where('correo', $correo);
        $this->db->update('estudiantes',$datos);

       return $this->db->affected_rows();

    }



}