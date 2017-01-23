<?php
class Reportes_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


    function calendario_propuestas($anio){

        $this->db->select("fecha_limite_recepcion,fecha_sustentacion");
        $this->db->from("calendario_trabajos_de_grado");
      //  $this->db->where("periodo",$periodo);

        $this->db->where("LEFT(periodo,4)", $anio);

        $result = $this->db->get();
        return $result->result_array();
    }


    function calendario_sustentaciones($fecha){


        $result= $this->db->query(" Select p.codigo, s.fecha,s.aula,p.titulo,s.hora,i.correo_director,i.correo_codirector,pa.correo_evaluador
                        FROM propuestas p, sustentaciones s, investigadores i, propuestas_por_evaluar pa
                        WHERE pa.codigo_propuesta=p.codigo
                        AND p.codigo = s.codigo_propuesta
                        AND p.codigo=i.codigo_propuesta
                        AND s.fecha= '$fecha'
                                
                        GROUP BY p.codigo;
        ");
        return $result->result_array();
    }

}