

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reportes extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('reportes_model','pdfs_model');
    }

    public function index()
    {
        //$data['provincias'] llena el select con las provincias españolas
        $data['provincias'] = $this->pdfs_model->calendario_propuestas('2016-05');

        //cargamos la vista y pasamos el array $data['provincias'] para su uso
        $this->load->view('pdfs_view', $data);
    }

    public function generar() {
        $this->load->library('tcppdf');
        $pdf = new Tcppdf('P', 'mm', 'letter', true, 'UTF-8', false);
        $pdf->SetCreator("FFFF");
        $pdf->SetAuthor('Israel Parra');
        $pdf->SetTitle('Ejemplo de provincías con TCPDF');
        $pdf->SetSubject('Tutorial TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config

        $ruta_logo = 'logo_cecar_reportes.png';
        $titulo_pagina = "FACULTAD DE CIENCIAS BÁSICAS, INGENIERÍA Y ARQUITECTURA";


        $pdf->SetHeaderData($ruta_logo, PDF_HEADER_LOGO_WIDTH, $titulo_pagina, "Coordinación investigación\n www.cecar.edu.co/siapg", array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
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
        $pdf->AddPage();

//fijar efecto de sombra en el texto
      //  $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Establecemos el contenido para imprimir

        $provincias = $this->pdfs_model->calendario_propuestas('2016');

        //preparamos y maquetamos el contenido a crear
        $html = '';
        $html .= "<style type=text/css>

                   th{
                        color: #fff; font-weight: bold; 
                        background-color: gray;
                        text-align: center;
                   
                   }
                   
                                  
  

                </style>";
        $html .= '<h2 >Sincelejo  '.date("Y-m-d").'</h2><h3>Estudiantes: <br>Ingeniería Industrial<br>Ingeniería de sistemas <br>Arquitectura</br> </h4>';

        $html .= '<h2 >Calendario de trabajos de grado</h2>';
        $html .= '<p>electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>';

        $html .= '<table border="1px">';
        $html .= '<tr ><th>Fecha límite de recepción </th><th>Fecha de sustentación</th></tr>';


        $this->load->library("formateador_fechas");

        //provincias es la respuesta de la función getProvinciasSeleccionadas($provincia) del modelo
        foreach ($provincias as $fila)
        {

            $id = $this->formateador_fechas->formateador($fila['fecha_limite_recepcion']);
            $localidad = $this->formateador_fechas->formateador($fila['fecha_sustentacion']);

            $html .= '<tr><td>         ' . $id . '</td><td>            ' . $localidad . '</td></tr>';
        }
        $html .= '</table>';

        $html .= '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>';



        $html .='

              <table>
            
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
                  
                  <br>
                  <br>
                    <td><strong>Comite de cordinación FCBIA</strong></td>
                    
                    <td style="text-align: center;"><p> <strong>Decano FCBIA</strong></p></td>
                  </tr>
                
            </table>';

        for ($i=0;$i<19;$i++) {
            $html .= '<br>';
        }

        $html .= '<p>electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>';



        $html .= "";

// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.

        $prov="Calendario";

        $nombre_archivo = utf8_decode("Localidades de ".$prov.".pdf");

        ob_end_clean();
        $pdf->Output($nombre_archivo, 'I');

    }


    function hola(){
        $this->load->library('tcppdf');

        $pdf = new Tcppdf('P', 'mm', 'letter', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nicola Asuni');
        $pdf->SetTitle('TCPDF Example 048');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING);

// set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
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
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

// ---------------------------------------------------------

// set font
        $pdf->SetFont('helvetica', 'B', 20);

// add a page
        $pdf->AddPage();

        $pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);

        $pdf->SetFont('helvetica', '', 8);

// -----------------------------------------------------------------------------

        $tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3</td>
        <td>COL 2 - ROW 1</td>
        <td>COL 3 - ROW 1</td>
    </tr>
    <tr>
        <td rowspan="2">COL 2 - ROW 2 - COLSPAN 2<br />text line<br />text line<br />text line<br />text line</td>
        <td>COL 3 - ROW 2</td>
    </tr>
    <tr>
       <td>COL 3 - ROW 3</td>
    </tr>

</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

        $tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3<br />text line<br />text line<br />text line<br />text line<br />text line<br />text line</td>
        <td>COL 2 - ROW 1</td>
        <td>COL 3 - ROW 1</td>
    </tr>
    <tr>
        <td rowspan="2">COL 2 - ROW 2 - COLSPAN 2<br />text line<br />text line<br />text line<br />text line</td>
         <td>COL 3 - ROW 2</td>
    </tr>
    <tr>
       <td>COL 3 - ROW 3</td>
    </tr>

</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

        $tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3<br />text line<br />text line<br />text line<br />text line<br />text line<br />text line</td>
        <td>COL 2 - ROW 1</td>
        <td>COL 3 - ROW 1</td>
    </tr>
    <tr>
        <td rowspan="2">COL 2 - ROW 2 - COLSPAN 2<br />text line<br />text line<br />text line<br />text line</td>
         <td>COL 3 - ROW 2<br />text line<br />text line</td>
    </tr>
    <tr>
       <td>COL 3 - ROW 3</td>
    </tr>

</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

        $tbl = <<<EOD
<table border="1">
<tr>
<th rowspan="3">Left column</th>
<th colspan="5">Heading Column Span 5</th>
<th colspan="9">Heading Column Span 9</th>
</tr>
<tr>
<th rowspan="2">Rowspan 2<br />This is some text that fills the table cell.</th>
<th colspan="2">span 2</th>
<th colspan="2">span 2</th>
<th rowspan="2">2 rows</th>
<th colspan="8">Colspan 8</th>
</tr>
<tr>
<th>1a</th>
<th>2a</th>
<th>1b</th>
<th>2b</th>
<th>1</th>
<th>2</th>
<th>3</th>
<th>4</th>
<th>5</th>
<th>6</th>
<th>7</th>
<th>8</th>
</tr>
</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// Table with rowspans and THEAD
        $tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2">
<thead>
 <tr style="background-color:#FFFF00;color:#0000FF;">
  <td width="30" align="center"><b>A</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="80" align="center"> <b>XXXX</b></td>
  <td width="80" align="center"><b>XXXX</b></td>
  <td width="45" align="center"><b>XXXX</b></td>
 </tr>
 <tr style="background-color:#FF0000;color:#FFFF00;">
  <td width="30" align="center"><b>B</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="80" align="center"> <b>XXXX</b></td>
  <td width="80" align="center"><b>XXXX</b></td>
  <td width="45" align="center"><b>XXXX</b></td>
 </tr>
</thead>
 <tr>
  <td width="30" align="center">1.</td>
  <td width="140" rowspan="6">XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="140">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center" rowspan="3">2.</td>
  <td width="140" rowspan="3">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="80">XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="80" rowspan="2" >RRRRRR<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center">3.</td>
  <td width="140">XXXX1<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center">4.</td>
  <td width="140">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// NON-BREAKING TABLE (nobr="true")

        $tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2" nobr="true">
 <tr>
  <th colspan="3" align="center">NON-BREAKING TABLE</th>
 </tr>
 <tr>
  <td>1-1</td>
  <td>1-2</td>
  <td>1-3</td>
 </tr>
 <tr>
  <td>2-1</td>
  <td>3-2</td>
  <td>3-3</td>
 </tr>
 <tr>
  <td>3-1</td>
  <td>3-2</td>
  <td>3-3</td>
 </tr>
</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")

        $tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2" align="center">
 <tr nobr="true">
  <th colspan="3">NON-BREAKING ROWS</th>
 </tr>
 <tr nobr="true">
  <td>ROW 1<br />COLUMN 1</td>
  <td>ROW 1<br />COLUMN 2</td>
  <td>ROW 1<br />COLUMN 3</td>
 </tr>
 <tr nobr="true">
  <td>ROW 2<br />COLUMN 1</td>
  <td>ROW 2<br />COLUMN 2</td>
  <td>ROW 2<br />COLUMN 3</td>
 </tr>
 <tr nobr="true">
  <td>ROW 3<br />COLUMN 1</td>
  <td>ROW 3<br />COLUMN 2</td>
  <td>ROW 3<br />COLUMN 3</td>
 </tr>
</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
        ob_end_clean();
//Close and output PDF document
        $pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
    }




    function reporte_calendario_sustentaciones(){

        $this->load->library('tcppdf');
        $pdf = new Tcppdf('L', 'mm', 'letter', true, 'UTF-8', false);
        $pdf->SetCreator("FFFF");
        $pdf->SetAuthor('Israel Parra');
        $pdf->SetTitle('Ejemplo de provincías con TCPDF');
        $pdf->SetSubject('Tutorial TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config

        $ruta_logo = 'logo_cecar_reportes.png';
        $titulo_pagina = "FACULTAD DE CIENCIAS BÁSICAS, INGENIERÍA Y ARQUITECTURA";


        $pdf->SetHeaderData($ruta_logo, PDF_HEADER_LOGO_WIDTH, $titulo_pagina, "Coordinación investigación\n www.cecar.edu.co/siapg", array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
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
        $pdf->AddPage();

//fijar efecto de sombra en el texto
        //  $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Establecemos el contenido para imprimir

        $sustentaciones = $this->pdfs_model->calendario_sustentaciones();

        //preparamos y maquetamos el contenido a crear
        $html = '';
        $html .= "<style type=text/css>

                   th{
                        color: #fff; font-weight: bold; 
                        background-color: gray;
                        text-align: center;
                   
                   }
                   
                                  
  

                </style>";

        $html .=  '<table>
            
                  <tr>
                    <th><h2>SUSTENTACIÓN PROPUESTAS DE TRABAJOS DE GRADO</h2></th>                    
                  </tr>
                  
             
                   <tr>
                       <td>Fecha:</td>
                       <td>Aula: </td>
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








        $html .= '<h2 >Calendario de trabajos de grado</h2>';
        $html .= '<p>electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>';

        $html .= '<table border="1px">';
        $html .= '<tr ><th>Fecha límite de recepción </th><th>Fecha de sustentación</th></tr>';


        $this->load->library("formateador_fechas");

        //provincias es la respuesta de la función getProvinciasSeleccionadas($provincia) del modelo
        foreach ($provincias as $fila)
        {

            $id = $this->formateador_fechas->formateador($fila['fecha_limite_recepcion']);
            $localidad = $this->formateador_fechas->formateador($fila['fecha_sustentacion']);

            $html .= '<tr><td>         ' . $id . '</td><td>            ' . $localidad . '</td></tr>';
        }
        $html .= '</table>';

        $html .= '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>';



        $html .='

              <table>
            
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
                  
                  <br>
                  <br>
                    <td><strong>Comite de cordinación FCBIA</strong></td>
                    
                    <td style="text-align: center;"><p> <strong>Decano FCBIA</strong></p></td>
                  </tr>
                
            </table>';

        for ($i=0;$i<19;$i++) {
            $html .= '<br>';
        }

        $html .= '<p>electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>';



        $html .= "";

// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.

        $prov="Calendario";

        $nombre_archivo = utf8_decode("calendario_sustentaciones.pdf");

        ob_end_clean();
        $pdf->Output($nombre_archivo, 'I');



    }
}