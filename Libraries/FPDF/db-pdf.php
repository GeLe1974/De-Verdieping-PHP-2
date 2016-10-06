<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 03/10/16
 * Time: 20:48
 */

include_once 'functies.php';
include 'jpgraph-4.0.1/src/jpgraph.php';
include 'jpgraph-4.0.1/src/jpgraph_bar.php';


$studenten = getAllGrades();

//var_dump($studenten);
$dataNaam = [];
$dataPhp1 = [];
$dataPhp2 = [];
foreach ($studenten as $student){

    array_push($dataPhp1,$student['php1']);
    array_push($dataPhp2,$student['php2']);
    array_push($dataNaam,$naam = ($student['naam'] ." " . $student['voornaam']));
}

//echo json_encode($studenten);
//var_dump($dataPhp1);
//var_dump($dataPhp2);
//var_dump($dataNaam);





$graph = new Graph(800,400);
$graph->SetScale('textlin',0,40);


$bar1 = new BarPlot($dataPhp1);
$bar1->SetFillColor(0,255,0);
$bar2 = new BarPlot($dataPhp2);
$bar2->SetFillColor(0,0,0);
$lot = new AccBarPlot([$bar1,$bar2]);


$graph->Add($lot);
$graph->title->Set('Rapport PHP');

$graph->Stroke();



echo"<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Rapport</title>
    <!-- Latest compiled and minified CSS & JS -->
<link rel=\"stylesheet\" media=\"screen\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">
<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>
<link rel='stylesheet' href='font-awesome/css/font-awesome.css'>

</head>
<body>
<div class='jumbotron'>
	<div class='container'>
		<h1>Rapport</h1>
		<p>PHP1 & PHP2</p>
		<p>
			<a href='PDFRapport.php' class=\"btn btn-success btn-lg\">PDF <i class=\"fa fa-print\"></i></a>
		</p>
	</div>
</div>
<dir class='container'>
<table class=\"table table-bordered table-hover\">


	<thead>
		<tr>
			<th>Naam</th>
			<th>Voornaam</th>
			<th>PHP1</th>
			<th>PHP2</th>
			<th>Totaal</th>
		</tr>
	</thead>
	<tbody>";


foreach ($studenten as $student) {
    echo "<tr>
			<td>" . $student['naam'] . "</td>
			<td>" . $student['voornaam'] . "</td>
			<td>" . $student['php1'] . "</td>
			<td>" . $student['php2'] . "</td>
			<td>" . $totaal = $student['php1']+ $student['php2'] . "</td>
		</tr>";

};

echo"
</dir>
	</tbody>
</table>

<div class=\"form - group\">
    <div class=\"col - sm - offset - 2 col - sm - 10\">

    </div>
</div>

</body>
</html>";

