<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 23/09/16
 * Time: 09:23
 */



$conn = new PDO('sqlite:data/data.sqlite');
$query = $conn->prepare('SELECT * FROM Boeken ');
$query->execute();
$boeken = $query->fetchAll();






include_once "html/overzicht.html.php";