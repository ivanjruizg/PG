<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Estudiantes_Model extends  CI_Model {



    function consultar($nombres){





        $this->db->select("correo AS value, CONCAT(nombres, ' ', primer_apellido,' ',segundo_apellido) AS label", FALSE);
        $this->db->from('estudiantes');
        $this->db->where_not_in("correo",$this->consultar_estudiantes_con_propuestas_presentadas());
        $this->db->like('nombres', $nombres);
        $this->db->or_like('primer_apellido', $nombres);
        $this->db->or_like('segundo_apellido', $nombres);

        $reslt = $this->db->get();
        return $reslt->result_array();

    }


    function consultar_estudiantes_con_propuestas_presentadas(){

       $result =  $this->db->query("SELECT i.correo_estudiante FROM investigadores i");

        $est = array($this->session->userdata('correo'));

        foreach ($result->result_array() as $a){

            array_push($est,$a['correo_estudiante']);

        }


        return $est;


    }




    function consultar_mis_propuestas($correo){

        $this->db->select("p.titulo,p.ruta_propuesta");
        $this->db->from('propuestas p');
        $this->db->join('investigadores i', 'p.codigo = i.codigo_propuesta');
        $this->db->where("correo_estudiante",$correo);

        $result = $this->db->get();

        return $result->result_array();
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


    function descripcion_propuesta(){


            $this->db->select("p.codigo,p.titulo,p.fecha_hora_subida,ep.descripcion");
            $this->db->from('propuestas p');
            $this->db->join('investigadores i', 'p.codigo = i.codigo_propuesta');
            $this->db->join('estado_propuesta ep', 'p.estado = ep.codigo');
            $this->db->where("correo_estudiante",$this->session->userdata('correo'));

            $result = $this->db->get();

            return $result->result_array();


    }



}