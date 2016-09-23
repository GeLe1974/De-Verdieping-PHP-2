<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 23/09/16
 * Time: 10:20
 */


$boek =[];
if(!isset($_POST['actie'])){


    $boek = [
        'titel'         => '',
        'auteur'        => '',
        'samenvatting'  => '',
        'knop'          =>  'Toevoegen',
    ];

    include_once 'html/formulier.html.php';
}else{
    //echo'wtf';
    //unset($_POST['actie']);

    $conn = new PDO('sqlite:data/data.sqlite');
    $query = $conn->prepare('INSERT INTO Boeken (titel,auteur,samenvatting) VALUES (:titel, :auteur, :samenvatting)');
    $boek = [
        'auteur'        =>  $_POST['auteur'],
        'titel'         =>  $_POST['titel'],
        'samenvatting'   =>  $_POST['samenvatting'],
    ];


    $query->execute($boek);
    //var_dump($query);
    //die;

    echo'<h3>'.$boek['titel'].' van '.$boek['auteur'].' toegevoegd.</h3>';
    echo '<a  href="index.php">Terug naar overzicht >> </a> ';
    unset($_POST);

    }

