<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 04/10/16
 * Time: 11:42
 */
function getAllGrades()
{
    $conn = new PDO('sqlite:database.sqlite');
    $query = $conn->prepare("SELECT naam,voornaam,php1,php2 FROM studenten ORDER BY naam ASC ");
    $query->execute();
    $studenten = $query->fetchAll();

    return $studenten;
//var_dump($studenten);
}