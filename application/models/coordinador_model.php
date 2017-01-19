<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Ing. José Ríos
 * Date: 31/10/2016
 * Time: 4:21 PM
 */
class Coordinador_Model extends  CI_Model {




    function asignar_codirector($codigo_propuesta, $datos)
    {

        $this->db->where("codigo_propuesta", $codigo_propuesta);

        $this->db->update("investigadores", $datos);

        return $this->db->affected_rows();

    }


    function asignar_director($codigo_propuesta, $datos)
    {

        /*
         $this->db->select('*');
        $this->db->from('investigadores i');
        $this->db->where('i.codigo_propuesta', $codigo_propuesta);
        $this->db->where('i.correo_director =', null);
        $query = $this->db->get();


        if ($query->num_rows() > 0) {

            $this->db->where("codigo_propuesta", $codigo_propuesta);

            $this->db->insert("investigadores", $datos);

            return $this->db->num_rows();

        } else {


            $this->db->where("codigo_propuesta", $codigo_propuesta);

            $this->db->update("investigadores", $datos);

            return $this->db->affected_rows();

        }

        */


        $this->db->where("codigo_propuesta", $codigo_propuesta);

        $this->db->update("investigadores", $datos);

        return $this->db->affected_rows();

    }

    function asignar_evaluadores($codigo_propuesta,$datos1,$datos2)
    {



        $this->db->where("codigo_propuesta", $codigo_propuesta);

        $this->db->delete("propuestas_por_evaluar");


        $this->db->insert("propuestas_por_evaluar",$datos1);
        $this->db->insert("propuestas_por_evaluar",$datos2);

        return $this->db->affected_rows();

    }


    function buscarCarta($codigo)
    {
        $this->db->select("p.ruta_carta");
        $this->db->from('propuestas p');
        $this->db->where('p.codigo', $codigo);

        $result = $this->db->get();

        return $result->result_array();

    }


    function cambiar_clave_de_acceso($clave,$datos){

        if(strcmp($clave,$this->obtener_clave())==0){


            $this->db->where('correo=',$this->session->userdata('correo') );

            $this->db->update("docentes",$datos);

            return $this->db->affected_rows();
        }

        return 0;

    }


    function cambiar_fechas_periodos($periodo, $fecha_limite_recepcion, $fecha_sustentacion)
    {

        $fecha_inicio_recepcion = date_sub(date_create($fecha_limite_recepcion), date_interval_create_from_date_string("5 days"));


        $datos = array(

            "fecha_inicio_recepcion" => date_format($fecha_inicio_recepcion, "Y-m-d"),
            "fecha_limite_recepcion" => $fecha_limite_recepcion,
            "fecha_sustentacion" => $fecha_sustentacion

        );


        $this->db->where("periodo", $periodo);

        $this->db->update("calendario_trabajos_de_grado", $datos);

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


    function consultar_propuestas_a_sustentar(){

        $result =  $this->db->query("SELECT s.codigo_propuesta FROM sustentaciones s
                                        WHERE s.codigo_propuesta  IS NOT NULL");



        $codigos = array("-1");

        foreach ($result->result_array() as $a){

            array_push($codigos,$a['codigo_propuesta']);

        }


        return $codigos;



    }




    function listar_propuestas_periodo($periodo_recepcion=null)
    {

        $this->db->select("p.codigo, p.titulo, p.ruta_carta, tp.convencion AS tipo,   DATE_FORMAT( p.fecha_hora_subida,'%d %b %y') AS fecha");
        $this->db->from('propuestas p');
        $this->db->join('tipos_propuesta tp', 'p.tipo = tp.codigo');


        if($periodo_recepcion!=null){

            $this->db->where("periodo_recepcion",$periodo_recepcion);
        }



        $result = $this->db->get();

        return $result->result_array();

    }

    function listar_propuestas_a_evaluar($propuestas)
    {

        $this->db->select("p.titulo,p.codigo,pa.correo_evaluador", FALSE);
        $this->db->from('propuestas p');
        $this->db->join('propuestas_por_evaluar pa', 'pa.codigo_propuesta = p.codigo');

        $this->db->where_not_in('p.codigo', $propuestas);
        $this->db->where_not_in('p.codigo', $this->consultar_propuestas_a_sustentar());

        $this->db->group_by('p.codigo');

        $result = $this->db->get();
        return $result->result_array();


    }


    function quitar_propuesta_horario_sustentacion($codigo){


        $datos = array(

            "codigo_propuesta" => null,

        );


        $this->db->where("codigo",$codigo);
        $this->db->update("sustentaciones", $datos);

        return $this->db->affected_rows();


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