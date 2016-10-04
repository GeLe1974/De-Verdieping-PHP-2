<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 03/10/16
 * Time: 13:59
 */

require_once 'fpdf181/fpdf.php';
$auteur = 'Geert';

$fpdf = new FPDF();

$fpdf->AddPage('P');
$fpdf->SetFont('Arial','B',16);
$fpdf->Cell(40,20,'Eerste PDF',1,1,'C');
$fpdf->Cell(40,20,"Gemaakt door : ".$auteur);
$fpdf->Output();

