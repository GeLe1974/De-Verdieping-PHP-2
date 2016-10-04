<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 23/09/16
 * Time: 12:31
 */

//var_dump($_POST);
//die;
$id = $_POST['id'];

$conn = new PDO('sqlite:data/data.sqlite');

$query = $conn->prepare("DELETE FROM Boeken WHERE id = $id");

$query->execute();

header('location: eerstePDF.php');