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
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $conn->prepare("SELECT * FROM studenten ORDER BY naam ASC ");
    $query->execute();
    $studenten = $query->fetchAll(PDO::FETCH_ASSOC);

    return $studenten;
//var_dump($studenten);
}