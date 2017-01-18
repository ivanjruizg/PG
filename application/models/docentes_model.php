<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Ing. José Ríos
 * Date: 31/10/2016
 * Time: 4:21 PM
 */
class Docentes_Model extends  CI_Model
{

    function consultar($nombres)
    {

        $this->db->select("correo AS value, CONCAT(nombres, ' ', primer_apellido,' ',segundo_apellido) AS label", FALSE);
        $this->db->like('nombres', $nombres);
        $this->db->or_like('primer_apellido', $nombres);
        $this->db->or_like('segundo_apellido', $nombres);
        $this->db->from('docentes');
        $reslt = $this->db->get();
        return $reslt->result_array();

    }


    function cambiar_clave_de_acceso($clave, $datos)
    {

        if (strcmp($clave, $this->obtener_clave()) == 0) {


            $this->db->where('correo=', $this->session->userdata('correo'));

            $this->db->update("docentes", $datos);

            return $this->db->affected_rows();
        }

        return 0;

    }


    function obtener_clave()
    {

        $this->db->select("clave");
        $this->db->where('correo=', $this->session->userdata('correo'));
        $this->db->from('docentes');

        $reslt = $this->db->get();

        foreach ($reslt->result_array() as $clave) {

            return $clave['clave'];

        }

    }

    function propuestas_por_revisar($correo_docente)
    {

        $this->db->select("p.codigo, p.titulo, tp.convencion AS tipo,ruta_propuesta");
        $this->db->from('propuestas p');
        $this->db->join('tipos_propuesta tp', 'p.tipo = tp.codigo');
        $this->db->join('propuestas_por_evaluar i', 'p.codigo = i.codigo_propuesta');
        $this->db->where('i.correo_evaluador', $correo_docente);

        $result = $this->db->get();

        return $result->result_array();

    }


    function propuestas_dirigidas($correo_docente)

    {
        $this->db->select("p.codigo, p.titulo, tp.convencion AS tipo,ruta_propuesta");
        $this->db->from('propuestas p');
        $this->db->join('tipos_propuesta tp', 'p.tipo = tp.codigo');

        $this->db->join('investigadores i', 'p.codigo = i.codigo_propuesta');
        $this->db->join('tipos_propuesta t', ' p.tipo = t.codigo');
        $this->db->join('docentes e', 'i.correo_director = e.correo');
        $this->db->where('i.correo_director', $correo_docente);
        $this->db->group_by('p.codigo');

        $result = $this->db->get();

        return $result->result_array();

    }

    function propuestas_co_dirigidas($correo_docente)
    {

        $this->db->select("p.codigo, p.titulo, tp.convencion AS tipo,ruta_propuesta");
        $this->db->from('propuestas p');
        $this->db->join('tipos_propuesta tp', 'p.tipo = tp.codigo');

        $this->db->join('investigadores i', 'p.codigo = i.codigo_propuesta');
        $this->db->join('tipos_propuesta t', ' p.tipo = t.codigo');
        $this->db->join('docentes e', 'i.correo_director = e.correo');
        $this->db->where('i.correo_codirector', $correo_docente);
        $this->db->group_by('p.codigo');

        $result = $this->db->get();

        return $result->result_array();


    }

    function registrar_informe($codigo_propuesta, $datos_informe, $datos_propuesta)
    {

        $this->db->where("codigo", $codigo_propuesta);
        $this->db->update("propuestas", $datos_propuesta);

        $this->db->insert("informes_finales", $datos_informe);

        return $this->db->affected_rows();


    }


    function listar_propuestas_a_evaluar($propuestas)
     {
          $this->db->select("p.titulo,p.codigo,pa.correo_evaluador1,pa.correo_evaluador2", FALSE);
         $this->db->from('propuestas p');
         $this->db->join('propuestas_asignadas pa', 'pa.codigo_propuesta = p.codigo');
         $this->db->where('pa.correo_evaluador1 !=', null);
         $this->db->where_not_in('p.codigo', $propuestas);
         $this->db->where_not_in('p.codigo', $this->consultar_propuestas_a_sustentar());

         $result = $this->db->get();
         return $result->result_array();


    }


     function propuestas_por_evaluar_abiertas($correo_evaluador){

            /* "SELECT pa.codigo, p.titulo FROM sustentaciones s, propuestas_asignadas pa,propuestas p
 + WHERE s.codigo_propuesta = pa.codigo_propuesta
 + AND p.codigo = pa.codigo_propuesta
 + AND s.fecha = CURDATE()
 + AND CURTIME() >= s.hora  AND CURTIME()<=ADDTIME(s.hora,'1:00:00')";*/

            $this->db->select("p.codigo, p.titulo");
            $this->db->from("propuestas p");
            $this->db->join("propuestas_por_evaluar pa","pa.codigo_propuesta = p.codigo");
            $this->db->join("sustentaciones s","p.codigo = s.codigo_propuesta");
            $this->db->where("s.fecha = CURDATE()");
            $this->db->where("pa.correo_evaluador",$correo_evaluador);

            $this->db->where("CURTIME() >= s.hora");
            $this->db->where("CURTIME()<=ADDTIME(s.hora,'1:00:00')");


            $result = $this->db->get();

           return $result->result_array();

    }



    function listar_preguntas(){

            $result=$this->db->get('rubrica_evaluacion_propuesta');
            return $result->result_array();


    }



     function crear_detalle_evaluacion($correo_evaluador,$codigo_propuesta,$codigo_pregunta,$nota){


            $datos  = array(

                    "codigo_propuesta"=>$codigo_propuesta,
                    "correo_evaluador"=>$correo_evaluador,
                    "codigo_pregunta"=>$codigo_pregunta,
                    "nota"=>$nota,



               );


            $this->db->insert("propuestas_evaluadas_detalle",$datos);



       }


     function crear_evaluacion($correo_evaluador,$codigo_propuesta,$nota,$observaciones){

            $datos  = array(

                    "codigo_propuesta"=>$codigo_propuesta,
                    "correo_evaluador"=>$correo_evaluador,
                    "observaciones"=>$observaciones,
                    "nota"=>$nota



                    );


            $this->db->insert("propuestas_evaluadas",$datos);

      }

     function  consultar_evaluacion($codigo_propuesta){


            $this->db->select("pe.nota,r.valor_pregunta");
            $this->db->from("propuestas_evaluadas_detalle pe");
            $this->db->join("rubrica_evaluacion_propuesta r","r.codigo = pe.codigo_pregunta");
            $this->db->where("pe.codigo_propuesta",$codigo_propuesta);


            $result =$this->db->get();


            return $result->result_array();
 }





}