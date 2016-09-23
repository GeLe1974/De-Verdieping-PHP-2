<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 23/09/16
 * Time: 12:46
 */


$id = $_POST['id'];

//echo $id;

//var_dump($_POST);

$conn= new PDO('sqlite:data/data.sqlite');
$query = $conn->prepare("SELECT * FROM Boeken WHERE id = $id ");
$query->execute();

$boek = $query->fetch(PDO::FETCH_ASSOC);

var_dump($boek);
die;





$boek = [
    'knop'          =>  'Toevoegen',
];

print_r($boek);


//include_once "html/formulier.html.php";

