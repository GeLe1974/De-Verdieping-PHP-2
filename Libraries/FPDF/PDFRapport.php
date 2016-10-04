<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 04/10/16
 * Time: 11:41
 */

require_once 'fpdf181/fpdf.php';
include_once 'functies.php';

$studenten = getAllGrades();

//print_r($studenten);
$fields= [
    [
        'name'  =>  'Naam',
        'width' =>  '35',],
    [   'name'  =>  'Voornaam',
        'width' =>  '35'],
    [   'name'  =>  'PHP1',
        'width' =>  '15'],
    [   'name'  =>  'PHP2',
        'width' =>  '15'],
    [   'name'  =>  'Totaal',
        'width' =>  '15'],
    ];



class Rapport extends FPDF{

    function BuildRapport($fields,$data){
        $this->SetFont('Arial','B',10);
        $this->SetTextColor(100,100,100);
        foreach ($fields as $field){
            $this->Cell($field['width'],10,$field['name'],1,0,'C');

        }
        $this->Ln();
        $this->SetFont('Arial','',9);
        foreach ($data as $row){
            $this->Cell($fields[0]['width'],10,$row[0],1,0,'C');
            $this->Cell($fields[1]['width'],10,$row[1],1,0,'C');
            $this->Cell($fields[2]['width'],10,$row[2],1,0,'C');
            $this->Cell($fields[3]['width'],10,$row[3],1,0,'C');
            $sum = ($row[3] + $row[2]);
            if($sum <20) $this->SetTextColor(255,100,100);
            $this->Cell($fields[4]['width'],10,$sum,1,1,'C');
            $this->SetTextColor(100,100,100);

        }

    }


}

$rapport = new Rapport();

$rapport->AddPage('L');
$rapport->SetFont('Arial','B',15);
$rapport->Cell('',15,'Rapport Schooljaar 2016-2017',1,1,'C','','db-pdf.php');
$rapport->Ln(25);
$rapport->BuildRapport($fields,$studenten);


$rapport->Output();