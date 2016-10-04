<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 03/10/16
 * Time: 14:22
 */

require_once 'fpdf181/fpdf.php';

class MyPdf extends FPDF{

    public function __construct($orientation, $unit, $size,$title,$author)
    {
        parent::__construct($orientation, $unit, $size);
        $this->title = $title;
        $this->author = $author;
    }

    function Header()
    {
        parent::Header();
        $this->SetFont('Times','I',16);
        $this->Cell(20,20,$this->Image('images/logo.jpg',10,10,20,20),1,0);
        $this->SetFont('Times','I',16);
        $w= $this->GetStringWidth($this->title)+100;
        $this->Cell($w,20,$this->title,1,0,'C');
        $this->Ln();
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Door '.$this->author.' -> Blz. ' . $this->PageNo() , 0,0,'C');
    }

}

$pdf = new MyPdf('L','mm','A4','Is nice !','Geert');
$pdf->AddPage();
$pdf->SetFont('Arial','I',10);
$pdf->Cell(100,15,'Mijn Pagina');
$pdf->AddPage();
$pdf->Cell(100,15,'Mijn Tweede Pagina');
$pdf->Output();