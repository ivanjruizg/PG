

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
        $this->load->model('reportes_model', 'pdfs_model');

    }


    public function calendario_de_trabajos_de_grado()
    {


        $this->load->library('tcppdf');
        $pdf = new Tcppdf('P', 'mm', 'letter', true, 'UTF-8', false);
        $pdf->SetCreator("FFFF");
        $pdf->SetAuthor('Israel Parra');
        $pdf->SetTitle('Ejemplo de provincías con TCPDF');
        $pdf->SetSubject('Tutorial TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');


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

        $provincias = $this->pdfs_model->calendario_propuestas(date('Y'));

        $this->load->library("formateador_fechas");

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

        $html .= '<h4 >Sincelejo  ' .$this->formateador_fechas->formateador( date("Y-m-d")) . '</h4>
        
        <h3>Estudiantes: </h3>
        <h5>Ingeniería Industrial </h5>
        <h5>Ingeniería de sistemas </h5>
         <h5>Arquitectura</h4>
       ';

        $html .= '<h2 >Calendario de trabajos de grado</h2>';
        $html .= '<p>electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>';

        $html .= '<table border="1px">';
        $html .= '<tr ><th>Fecha límite de recepción </th><th>Fecha de sustentación</th></tr>';




        //provincias es la respuesta de la función getProvinciasSeleccionadas($provincia) del modelo
        foreach ($provincias as $fila) {

            $id = $this->formateador_fechas->formateador($fila['fecha_limite_recepcion']);
            $localidad = $this->formateador_fechas->formateador($fila['fecha_sustentacion']);

            $html .= '<tr>
                        <td class="text-center">'.$id.'</td>
                        <td class="text-center">'.$localidad.'</td>
                        </tr>';
        }
        $html .= '</table>';

        $html .= '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>';


        $html .= '

              <table width="100%">
            
                  <tr>
                    <td>Cordialmente</td>
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
                    <td><strong>Comite de cordinación FCBIA</strong></td>
                    
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


        $this->load->model('propuestas_model');


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
        $pdf->SetFont('helvetica', 'B', 14);

// add a page
        $pdf->AddPage();

        $pdf->Write(0, 'SUSTENTACIÓN PROPUESTAS DE TRABAJOS DE GRADO', '', 0, 'C', true, 0, false, false, 0);

        $pdf->SetFont('helvetica', '', 8);



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
                <table border="1">
                 
                 <tr>
                    <th  class="tg-ecrz" colspan="5">SUSTENTACIÓN PROPUESTAS DE TRABAJOS DE GRADO</th>
                    <th class="tg-ecrz" colspan="1">Fecha '.$fecha.'</th>
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



        $calendario=$this->pdfs_model->calendario_sustentaciones($fecha);

    //    $x= $result->result_array();



        $i =1;

        foreach ($calendario as $horario){



            $evaluadores = $this->propuestas_model->consultar_evaluadores($horario['codigo']);
            $estudiantes = $this->propuestas_model->consultar_estudiantes($horario['codigo']);
            $co_director = $this->propuestas_model->consultar_codirector($horario['codigo']);
            $director = $this->propuestas_model->consultar_director($horario['codigo']);




            $tbl.=' 
                  <tr>
                    <td class="text-center">'.$i.'</td>
                    <td class="text-center">'.$horario['titulo'].'</td>
                    <td class="text-center">'.$estudiantes[0]['nombre'].'<hr>'.$estudiantes[1]['nombre'].'<br>'.$estudiantes[2]['nombre'].'</td>
                    <td class="text-center">'.$director[0]['nombre'].'<br>'.$co_director[0]['nombre'].'</td>
                    <td class="text-center">'.$evaluadores[0]['nombre'].'<br>'.$evaluadores[1]['nombre'].'</td>

                    <td class="text-center">'.$horario['hora'].'</td>
                    <td class="text-center">'.$horario['aula'].'</td>
                  </tr>
             
';

            $i++;

        }

        $tbl.= '</table>';

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



}