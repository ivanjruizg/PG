<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Estudiantes_Model extends  CI_Model {



    function calendario_recepcion_abierto()
    {


        /*
         *
         *  Select fecha_inicio_recepcion
            from calendario_trabajos_de_grado
            where CURDATE() >= fecha_inicio_recepcion and CURDATE() <= fecha_limite_recepcion
         *
         *
         *
         *
         */


        $this->db->select('c.fecha_inicio_recepcion AS calendario_abierto,periodo');
        $this->db->from('calendario_trabajos_de_grado c');
        $this->db->where('CURDATE() >=c.fecha_inicio_recepcion');
        $this->db->where('CURDATE() <= c.fecha_limite_recepcion');
        $result = $this->db->get();

        return $result->result_array()[0]['periodo'];

    }

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

        if(strcmp($clave,$this->obtener_clave())==0){


            $this->db->where('correo=',$this->session->userdata('correo') );

            $this->db->update("estudiantes",$datos);

            return $this->db->affected_rows();
        }

        return 0;

    }

    function fecha_recepcion_abierta()
    {


        //Select * from calendario_trabajos_de_grado c where NOW() <= c.fecha_inicio_recepcion limit 1


        $this->db->select(' c.fecha_inicio_recepcion AS calendario_abierto');
        $this->db->from('calendario_trabajos_de_grado c');
        $this->db->where('NOW() <= c.fecha_inicio_recepcion');
        $this->db->limit(1);
        $result = $this->db->get();

        return $result->result_array();


    }


    function obtener_clave(){

        $this->db->select("clave");
        $this->db->where('correo=',$this->session->userdata('correo') );
        $this->db->from('estudiantes');

        $reslt = $this->db->get();

        foreach ($reslt->result_array() as $clave){

            return $clave['clave'];

        }

    }

    function registrar_propuestas($datos_propuesta)
    {

        $this->db->insert("propuestas", $datos_propuesta);
        $codigo_propuesta = $this->db->insert_id();


        $propuestas_asigandas = array(

            "codigo_propuesta" => $codigo_propuesta

        );
        $this->db->insert("propuestas_asignadas", $propuestas_asigandas);


        return $codigo_propuesta;
    }


    function registrar_investigadores($datos_investigador)
    {

        $this->db->insert("investigadores", $datos_investigador);
        return $this->db->affected_rows();
    }


    function reloj()
    {


        $fecha_calendario = $this->fecha_recepcion_abierta();


        if (count($fecha_calendario) > 0) {


            $datos = array();

            foreach ($fecha_calendario as $calendario) {

                $datos = array('calendario_abierto' => $calendario['calendario_abierto']);

            }


            $fecha_calendario = $datos['calendario_abierto'];

            $this->db->select("TIMESTAMPDIFF(SECOND,NOW(),'$fecha_calendario') AS segundos");
            $this->db->from('calendario_trabajos_de_grado c');
            $result = $this->db->get();
            $segundos = $result->result_array();

            return $segundos;


        } else {

            return FALSE;

        }

    }


}