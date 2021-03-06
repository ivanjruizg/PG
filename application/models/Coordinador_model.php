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







    function listar_propuestas_periodo($periodo_recepcion=null)
    {

        $this->db->select("p.codigo, p.titulo, p.ruta_carta, tp.convencion AS tipo,e.descripcion AS estado");
        $this->db->from('propuestas p');
        $this->db->join('tipos_propuesta tp', 'p.tipo = tp.codigo');
        $this->db->join('estado_propuesta e', 'p.estado = e.codigo');



            $this->db->where("periodo_recepcion",$periodo_recepcion);
       

      //  $this->db->order_by('p.estado','DESC');

        $result = $this->db->get();

        return $result->result_array();

    }


    function listar_propuestas_por_revisar($periodo_recepcion=null)
    {

        $this->db->select("p.codigo, p.titulo, p.ruta_carta, tp.convencion AS tipo,e.descripcion AS estado");
        $this->db->from('propuestas p');
        $this->db->join('tipos_propuesta tp', 'p.tipo = tp.codigo');
        $this->db->join('estado_propuesta e', 'p.estado = e.codigo');




        $this->db->where("estado",0);

        $this->db->where("periodo_recepcion",$periodo_recepcion);


        //  $this->db->order_by('p.estado','DESC');

        $result = $this->db->get();

        return $result->result_array();

    }

    function listar_propuestas_para_asignar_directores($periodo_recepcion=null)
    {

        $this->db->select('p.codigo, p.titulo, p.ruta_carta, tp.convencion AS tipo,e.descripcion AS estado');
        $this->db->from('propuestas p');
        $this->db->join('tipos_propuesta tp', 'p.tipo = tp.codigo');
        $this->db->join('estado_propuesta e', 'p.estado = e.codigo');





        $this->db->where_in("estado",array(1, 2));


        $this->db->where("periodo_recepcion",$periodo_recepcion);


        $result = $this->db->get();

        return $result->result_array();

    }


    function listar_fechas_de_sustentacion(){


        /*

                     $this->db->select('periodo AS fecha');
             $this->db->from('calendario_trabajos_de_grado');
             $result = $this->db->get();


             */
             $this->db->distinct();


             $this->db->select('fecha');
             $this->db->from('sustentaciones');
             $result = $this->db->get();




        return $result->result_array();

    }



    function consultar_propuestas_con_notas_finales(){



        $result =  $this->db->query("SELECT s.codigo_propuesta FROM notas_finales_evaluacion_propuestas s
                                       ");

        /*

        $this->db->select("codigo_propuesta AS pc");
        $this->db->from("notas_finales_evaluacion_propuestas");
        $result = $this->db->get();

        */


        $est=array(-1);



        foreach ($result->result_array() as $a){

            array_push($est,$a['codigo_propuesta']);

        }


        return $est;

    }


    function listar_propuestas_evaluadas($periodo_recepcion=null)
    {




            $this->db->select('p.codigo, p.titulo,tp.convencion AS tipo');
            $this->db->from('propuestas p');


            $this->db->join('propuestas_evaluadas e', 'e.codigo_propuesta = p.codigo');
            $this->db->join('tipos_propuesta tp', 'p.tipo = tp.codigo');



        $this->db->where("p.estado",5);

        //$this->db->where_not_in('p.codigo',$this->consultar_propuestas_con_notas_finales());


        if($periodo_recepcion!=null){

                $this->db->where("p.periodo_recepcion",$periodo_recepcion);
           }


            $this->db->group_by('p.codigo');
            $result = $this->db->get();
            return $result->result_array();

    }



    function listar_propuestas_para_asignar_evaluadores($periodo_recepcion=null)
    {

        $this->db->select('p.codigo, p.titulo, p.ruta_carta, tp.convencion AS tipo,e.descripcion AS estado');
        $this->db->from('propuestas p');
        $this->db->join('tipos_propuesta tp', 'p.tipo = tp.codigo');
        $this->db->join('estado_propuesta e', 'p.estado = e.codigo');

        $this->db->where("periodo_recepcion",$periodo_recepcion);


        $this->db->where('estado',2);
        $this->db->or_where('estado',3);





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


    function consultar_propuestas_a_sustentar(){

        $result =  $this->db->query("SELECT s.codigo_propuesta FROM sustentaciones s
                                        WHERE s.codigo_propuesta  IS NOT NULL");



        $codigos = array("-1");

        foreach ($result->result_array() as $a){

            array_push($codigos,$a['codigo_propuesta']);

        }


        return $codigos;



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