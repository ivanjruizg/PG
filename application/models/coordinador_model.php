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

        if(strcmp($clave,$this->obtener_clave())==0){


            $this->db->where('correo=',$this->session->userdata('correo') );

            $this->db->update("docentes",$datos);

            return $this->db->affected_rows();
        }

        return 0;

    }


    function asignar_director($codigo_propuesta, $datos)
    {

        $this->db->where("codigo_propuesta", $codigo_propuesta);

        $this->db->update("investigadores", $datos);

        return $this->db->affected_rows();

    }

    function asignar_evaluadores($codigo_propuesta, $datos)
    {


        $this->db->where("codigo_propuesta", $codigo_propuesta);

        $this->db->update("propuestas_asignadas", $datos);

        return $this->db->affected_rows();


    }


    function cambiar_fechas_periodos($periodo, $fecha_inicio_recepcion, $fecha_limite_recepcion, $fecha_sustentacion)
    {

        $datos = array(

            "fecha_inicio_recepcion" => $fecha_inicio_recepcion,
            "fecha_limite_recepcion" => $fecha_limite_recepcion,
            "fecha_sustentacion" => $fecha_sustentacion

        );


        $this->db->where("periodo", $periodo);

        $this->db->update("calendario_trabajos_de_grado", $datos);

        return $this->db->affected_rows();

    }


    function asignar_codirector($codigo_propuesta, $datos)
    {

        $this->db->where("codigo_propuesta", $codigo_propuesta);

        $this->db->update("investigadores", $datos);

        return $this->db->affected_rows();

    }


    function quitar_propuesta_horario_sustentacion($codigo){


        $datos = array(

            "codigo_propuesta" => null,

        );


        $this->db->where("codigo",$codigo);
        $this->db->update("sustentaciones", $datos);

        return $this->db->affected_rows();


    }






    function crear_periodo($anio, $mes, $fecha_recepcion, $fecha_sustentacion)
    {


        $fecha_inicio_recepcion = date_sub(date_create($fecha_recepcion), date_interval_create_from_date_string("5 days"));

        $datos = array(

            "periodo" => $anio . "-" . $mes,
            "fecha_inicio_recepcion" => date_format($fecha_inicio_recepcion, "Y-m-d"),
            "fecha_limite_recepcion" => $fecha_recepcion,
            "fecha_sustentacion" => $fecha_sustentacion

        );

        return $this->db->insert("calendario_trabajos_de_grado", $datos);

    }

    function obtener_clave(){

        $this->db->select("clave");
        $this->db->where('correo=',$this->session->userdata('correo') );
        $this->db->from('coordinadores_investigacion');

        $reslt = $this->db->get();

        foreach ($reslt->result_array() as $clave){

            return $clave['clave'];

        }

    }


}