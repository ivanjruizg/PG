
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


require_once APPPATH . "/third_party/tcpdf/tcpdf.php";

class Tcppdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }


    public function Header() {
        // Logo
        $image_file = base_url('assets/img/logo_cecar_reportes.png');
        $this->Image($image_file, 15, 7, 50, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 11);
        // Title



        $this->SetY(10);
        $this->SetX(40);
        $this->Cell(0, 0, 'CORPORACION UNIVERSITARIA DEL CARIBE – CECAR', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetY(15);
        $this->SetX(40);
        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(0, 0, 'Facultad de Ciencias básicas, Ingeniería y Aquitectura', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetY(20);
        $this->SetX(25);
        $this->SetFont('helvetica', '', 9);
        $this->Cell(0, 0, 'Coordinación investigación', 0, false, 'C', 0, '', 0, false, 'M', 'M');



    }
}