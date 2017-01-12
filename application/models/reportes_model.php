<?php
class Reportes_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    //obtenemos las provincias para cargar en el select
    function getProvincias()
    {
        $query = $this->db->get('provincias_es');
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $fila)
            {
                $data[] = $fila;
            }
            return $data;
        }
    }


    function calendario_propuestas($anio){

        $this->db->select("fecha_limite_recepcion,fecha_sustentacion");
        $this->db->from("calendario_trabajos_de_grado");
      //  $this->db->where("periodo",$periodo);

        $this->db->where("LEFT(periodo,4)", $anio);

        $result = $this->db->get();
        return $result->result_array();
    }


    function calendario_sustentaciones(){



        $result= $this->db->query(" Select s.fecha,s.aula,p.titulo,s.hora,i.correo_director,i.correo_codirector,pa.correo_evaluador1,pa.correo_evaluador2
FROM propuestas p, sustentaciones s, investigadores i, propuestas_asignadas pa
WHERE pa.codigo_propuesta=p.codigo
        AND p.codigo = s.codigo_propuesta
        AND p.codigo=i.codigo_propuesta
        AND s.periodo_recepcion= '2017-01'
GROUP BY p.codigo;
        ");


/*
        $result= $this->db->query("Select s.fecha,s.aula,p.titulo,s.hora
FROM propuestas p, sustentaciones s 
WHERE p.codigo = s.codigo_propuesta
AND s.periodo_recepcion= '2017-01'
GROUP BY s.fecha;
        ");

        */

        /*$this->db->select("s.fecha, s.aula,p.titulo, s.hora, i.correo_director,i.correo_codirector,pa.correo_evaluador1,pa.correo_evaluador2");
        $this->db->from('propuestas p');
        $this->db->join('propuestas_asignadas pa', 'pa.codigo_propuesta=p.codigo');
        $this->db->join('sustentaciones s', 'p.codigo = s.codigo_propuesta');
        $this->db->join('investigadores i','p.codigo=i.codigo_propuesta');
        $this->db->where('s.periodo_recepcion','2017-1');
        $this->db->group_by('p.codigo');*/

       //$result = $this->db->get();
        return $result->result_array();



    }


    /*
    //obtenemos las localidades dependiendo de la provincia escogida
    function getProvinciasSeleccionadas($provincia)
    {
        $query = $this->db->query('SELECT l.provincia,l.localidad,l.id,p.provincia 
                                  from localidades_es l inner join provincias_es p
                                  on l.provincia = p.id and p.id = '.$provincia);
        $data["localidades"]=array();
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $fila)
            {
                $data["localidades"][$fila->id]["l.provincia"] = $fila->provincia;
                $data["localidades"][$fila->id]["l.localidad"] = $fila->localidad;
                $data["localidades"][$fila->id]["l.id"] = $fila->id;
                $data["localidades"][$fila->id]["p.provincia"] = $fila->provincia;
            }
            return $data["localidades"];
        }
    }

    */
}