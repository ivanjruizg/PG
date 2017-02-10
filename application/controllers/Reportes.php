<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reportes extends CI_Controller
{
    /**
     * Reportes constructor.
     */
    function __construct()
    {
        parent::__construct();

        $this->load->model('propuestas_model');


    }


    public function calendario_de_trabajos_de_grado()
    {


        $this->load->library('tcppdf');
        $pdf = new Tcppdf('P', 'mm', 'letter', true, 'UTF-8', false);
        $pdf->SetTitle('Circular Trabajos de Grado');



        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);

// Establecer el tipo de letra

//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.

        $pdf->SetFont('helvetica', '', 10);

// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage('P');

//fijar efecto de sombra en el texto
        //  $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Establecemos el contenido para imprimir

        $calendario = $this->propuestas_model->ver_calendario_de_trabajos_de_grado(date('Y'));

        $this->load->library("formateador_fechas");


        $pdf->writeBR(1);

        //preparamos y maquetamos el contenido a crear
        $html = '';
        $html .= "<style type=text/css>

                     th{
                        color: #fff; font-weight: bold; 
                       
                        text-align: center;
                        font-size: 12px;
                         background-color: #469B49;
                         
                        
                   
                   }
                   
                   .text-center{
                        
                        text-align: center;
                   }

                </style>";

        $html .= '<h4 >Sincelejo  ' . $this->formateador_fechas->formateador(date("Y-m-d")) . '</h4>
        
        <h3>Estudiantes: </h3>
        <h5>Ingeniería Industrial </h5>
        <h5>Ingeniería de sistemas </h5>
         <h5>Arquitectura</h4>
       ';

        $html .= '<h2 >Calendario de trabajos de grado</h2>';
        $html .= '<p style="text-align: justify">Mediante la presente se socializan las fechas de recepción y sustentación  a los estudiantes interesados 
                     en presentar su propuesta de trabajo de grado al comité de investigación del presente año.   
                     
                  </p>';

        $html .= '<table border="1px" style="padding: 3px">';
        $html .= '<tr ><th>Fecha límite de recepción </th><th>Fecha de sustentación</th></tr>';


        //provincias es la respuesta de la función getProvinciasSeleccionadas($provincia) del modelo
        foreach ($calendario as $fila) {

            $id = $this->formateador_fechas->formateador($fila['fecha_limite_recepcion']);
            $localidad = $this->formateador_fechas->formateador($fila['fecha_sustentacion']);

            $html .= '<tr>
                        <td class="text-center">' . $id . '</td>
                        <td class="text-center">' . $localidad . '</td>
                        </tr>';
        }
        $html .= '</table>';

        $html .= '<p>Envio de correspondencia o inquietudes : coordinacioninvestigacionfcbia@cecar.edu.co</p>';


        $html .= '

              <table width="100%">
            
                  <tr>
                    <td>Cordialmente.</td>
                    <td></td>
                    
                  </tr>
                  
             
                   <tr>
                       <td></td>
                       <td></td>
                    </tr>
             
                   <tr>
                       <td></td>
                       <td></td>
                   </tr>

                          
                   <tr>
                       <td></td>
                       <td></td>
                   </tr>
                   
                                
                   <tr>
                       <td></td>
                       <td></td>
                   </tr>

                  <tr>
                  
                  
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                   
                   <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  
                    <td><strong>Comite de coordinación FCBIA</strong></td>
                    
                    <td style="text-align: center;"><p> <strong>Decano FCBIA</strong></p></td>
                  </tr>
                
            </table>';


// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.

        $prov = "Calendario";

        $nombre_archivo = utf8_decode("Localidades de " . $prov . ".pdf");

        ob_end_clean();
        $pdf->Output($nombre_archivo, 'I');

    }


    function horario_de_sustentaciones()
    {


        $fecha = $this->input->post("fecha");


        $this->load->library('tcppdf');

        $pdf = new Tcppdf(PDF_PAGE_ORIENTATION, 'mm', 'letter', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 048');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');


        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            //  $pdf->setLanguageArray($l);
        }

// ---------------------------------------------------------

// set font
        $pdf->SetFont('helvetica', 'B', 11);

// add a page
        $pdf->AddPage();

        $pdf->Write(0, 'SUSTENTACIÓN PROPUESTAS DE TRABAJOS DE GRADO', '', 0, 'C', true, 0, false, false, 0);

        $pdf->SetFont('helvetica', '', 8);

        $pdf->writeBR(1);


        $tbl = '
        
        <style type=text/css>

                   th{
                        color: #fff; font-weight: bold; 
                       
                        text-align: center;
                        font-size: 12px;
                         background-color: #469B49;
                         
                        
                   
                   }
                   
                   .w30{
                        
                        width: 30px;
                   }
                   
                   .w20{
                        
                        width: 30px;
                   }
                   
                   .w30{
                        
                        width: 60px;
                   }
                   
                   .w130{
                        
                        width: 130px;
                   }
                   
                   
                   .opaco{
                   
                  
                   
                   }
                   
                   
                   .text-center{
                        
                        text-align: center;
                   }
                   
                                  
  

                </style>
                <table border="1" style="margin: 15px">
                 
                 <tr>
                    <th  class="tg-ecrz" colspan="5">SUSTENTACIÓN PROPUESTAS DE TRABAJOS DE GRADO</th>
                    <th class="tg-ecrz" colspan="1">Fecha ' . $fecha . '</th>
                  </tr>
                 

                 
                 <tr>
                 
                    <th class="w20 text-center">#</th>
                    <th  width="253"  class="text-center">PROPUESTAS</th>
                    <th class="text-center">ESTUDIANTES</th>
                    <th class="text-center">DIRECTORES Y CODIRECTORES</th>
                    <th class="text-center">EVALUADORES</th>
                    <th class="text-center w30">HORA</th>
                    <th class="text-center w130">AULA</th>
                    
                  </tr>
';


        $calendario = $this->propuestas_model->calendario_sustentaciones($fecha);

        //    $x= $result->result_array();


        $i = 1;

        foreach ($calendario as $horario) {


            $evaluadores = $this->propuestas_model->consultar_evaluadores($horario['codigo']);
            $estudiantes = $this->propuestas_model->consultar_estudiantes($horario['codigo']);
            $co_director = $this->propuestas_model->consultar_codirector($horario['codigo']);
            $director = $this->propuestas_model->consultar_director($horario['codigo']);


            $tbl .= ' 
                  <tr>
                    <td class="text-center">' . $i . '</td>
                    <td class="text-center">' . $horario['titulo'] . '</td>
                    <td class="text-center">' . $estudiantes[0]['nombre'] . '<br>' . $estudiantes[1]['nombre'] . '<br>' . $estudiantes[2]['nombre'] . '</td>
                  
                    <td class="text-center">' . $director[0]['nombre'] . '<br>' . $co_director[0]['nombre'] . '</td>
                    <td class="text-center">' . $evaluadores[0]['nombre'] . '<br>' . $evaluadores[1]['nombre'] . '</td>

                    <td class="text-center">' . $horario['hora'] . '</td>
                    <td class="text-center">' . $horario['aula'] . '</td>
                  </tr>
             
';

            $i++;

        }

        $tbl .= '</table>';

//        }
        $pdf->writeHTML($tbl, true, false, false, false, '');

        // $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $tbl, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);


// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")

// -----------------------------------------------------------------------------
        ob_end_clean();
//Close and output PDF document
        $pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
    }


    function acta_evaluacion_de_propuestas_de_grado()
    {


        $this->load->library('tcppdf');

        $pdf = new Tcppdf(PDF_PAGE_ORIENTATION, 'mm', 'letter', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 048');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');


        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            //  $pdf->setLanguageArray($l);
        }

// ---------------------------------------------------------

// set font
        $pdf->SetFont('helvetica', 'B', 12);

// add a page
        $pdf->AddPage("P");

        $pdf->writeBR(1);

        $pdf->Write(0, 'ACTA DE EVALUACIÓN DE LA PROPUESTA DE TRABAJO DE GRADO', '', 0, 'C', true, 0, false, false, 0);

        $pdf->SetFont('helvetica', '', 10);




        $pdf->writeHTML("<br>", true, false, false, false, '');




        $titulo= $this->propuestas_model->consultar_titulo(1);

        $estudiantes= $this->propuestas_model->consultar_estudiantes(1);
        $director= $this->propuestas_model->consultar_director(1);
        $co_director= $this->propuestas_model->consultar_codirector(1);


        $tbl = '
        
        <style type=text/css>

                   th{
                        color: #fff; font-weight: bold; 
                       
                        text-align: center;
                        font-size: 12px;
                         background-color: #469B49;
                         
                        
                   
                   }
                   
                   .w30{
                        
                        width: 30px;
                   }
                   
                   .w20{
                        
                        width: 30px;
                   }
                   
                   .w30{
                        
                        width: 60px;
                   }
                   
                   .w130{
                        
                        width: 130px;
                   }
                   
                   
                   .opaco{
                   
                  
                   
                   }
                   
                   
                   .text-center{
                        
                        text-align: center;
                   }
                   
                                  
  

                </style>
                <table border="">
                 
                 <tr>
                    <td  class="tg-ecrz" ><b>TÍTULO DE LA PROPUESTA:</b> </td>
                    
                  
                  </tr>
                  
                                   <tr>
                    <td  class="tg-ecrz" ></td>
                  </tr>
                  
                  <tr>
                    <td  class="tg-ecrz" >'.$titulo.'</td>
                    
                  
                  </tr>
                  
                                   <tr>
                    <td  class="tg-ecrz" ></td>
                  </tr>
                  
                  <tr>
                  <td  class="tg-ecrz" ><b>PRESENTADA :</b> 
                  
                    </td>
                  </tr>
                  
                 <tr>
                    <td  class="tg-ecrz" >'.$estudiantes[0]['nombre'].'<br>'.$estudiantes[1]['nombre'].'<br>'.$estudiantes[2]['nombre'].'
                    
                    
                    
                    
                    
                    
                    </td>
                  </tr>
                 
                 <tr>
                    <td  class="tg-ecrz" ><b>DIRECTORES :</b></td>
                  </tr>
                  
                 <tr>
                    <td  class="tg-ecrz" >'.$director[0]['nombre'].'</td>
                  </tr>
                 
                 <tr>
                    <td  class="tg-ecrz" >'.$co_director[0]['nombre'].'</td>
                  </tr>
                 
                 </table>

';




        $pdf->writeHTML($tbl, true, false, false, false, '');
        $evaluaciones=$this->propuestas_model->nota_parciales_propuesta(1);


        $pdf->writeBR(1);

        $tabla_evaluacion = '<table border="1" style="padding: 3px">


                 <tr>
                    <th class="tg-ecrz" >EVALUADORES</th>
                    <th class="tg-ecrz" >NOTA</th>
                 </tr>
                            ';



        $nota =0;

        foreach ($evaluaciones as $evaluacion){

            $tabla_evaluacion.='<tr>
                                    <th class="tg-ecrz" >'.$evaluacion['evaluador'].'</th>
                                    <th class="tg-ecrz" >'.$evaluacion['nota'].'</th>
                                 </tr>';


            $nota+=$evaluacion['nota'];
        }




        $tabla_evaluacion.='</table>';

        $pdf->writeBR(2);
        $pdf->writeHTML($tabla_evaluacion, true, false, false, false, '');

        $tabla_nota_final="";

        $tabla_nota_final.='<table><tr>
                                    
                                    <th class="tg-ecrz" ></th>
                                    <th style="text-align: right;" class="tg-ecrz"> <b> NOTA FINAL : '.($nota/2).'</b></th>
                                 </tr>
                                 
                                 </table>';



        $pdf->writeHTML($tabla_nota_final, true, false, false, false, '');



        $pdf->writeBR(16);


        $tabla_firmas = '<table border="">


                 <tr>
                    <th style="text-align: center;" class="tg-ecrz" >________________________________</th>
                    <th style="text-align: center;" class="tg-ecrz" >________________________________</th>
                 </tr>

                 <tr>
                    <th style="text-align: center;" class="tg-ecrz" >Decano FCBIA</th>
                    <th style="text-align: center;" class="tg-ecrz" >COOR. Comité de Investigación</th>
                    
                    

                    
                 </tr>
                            ';


        $tabla_firmas.='</table>';


        $pdf->writeHTML($tabla_firmas, true, false, false, false, '');
//        }
//        $pdf->writeHTML($tbl, true, false, false, false, '');

        // $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $tbl, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);


// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")

// -----------------------------------------------------------------------------
        ob_end_clean();
//Close and output PDF document
        $pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
    }


    function r(){

        $evaluaciones=$this->propuestas_model->nota_parciales_propuesta(1);

        echo var_dump($evaluaciones);

    }


}