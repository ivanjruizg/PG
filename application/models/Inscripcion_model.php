<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inscripcion_Model extends CI_Model
{



    function registrar($datos){

        $this->db->insert("estudiantes",$datos);

        return $this->db->affected_rows();
    }


    function registrar_docente($datos){

        $this->db->insert("docentes",$datos);

        return $this->db->affected_rows();
    }

    function consultar_correo($correo){


        $this->db->select('correo');
        $this->db->from('estudiantes');
        $this->db->where("correo", $correo);
        $reslt = $this->db->get();


        return $reslt->num_rows();
    }

    function consultar_correo_docente($correo){


        $this->db->select('correo');
        $this->db->from('docentes');
        $this->db->where("correo", $correo);
        $reslt = $this->db->get();


        return $reslt->num_rows();
    }


    function consultar($codigo_activacion){




        $this->db->select('correo,nombres');
        $this->db->from('estudiantes');
        $this->db->where("codigo_activacion", $codigo_activacion);
        $reslt = $this->db->get();


        return $reslt->result_array();
    }

    function consultar_docentes($codigo_activacion){




        $this->db->select('correo,nombres');
        $this->db->from('docentes');
        $this->db->where("codigo_activacion", $codigo_activacion);
        $reslt = $this->db->get();


        return $reslt->result_array();
    }


    function listar_carreras(){

        $this->db->select('codigo,nombre');
        $this->db->from('programas');
        $reslt = $this->db->get();

        return $reslt->result_array();

    }

    function listar_grupos_de_investigacion(){


        $this->db->select('codigo,nombre');
        $this->db->from('grupos_de_investigacion');
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

    function activar_docente($correo){

        $datos = array(

            "activo" =>1


        );

        $this->db->where('correo', $correo);
        $this->db->update('docentes',$datos);

        return $this->db->affected_rows();

    }


}