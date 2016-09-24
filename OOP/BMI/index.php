<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 24/09/16
 * Time: 17:17
 */

//use CLASSES\BMI as BMI;

require_once 'BMI.class.php';


$length = '170';
$weigth = 75;

$bmi = new CLASSES\BMI($length,$weigth);

print "<p>BMI :".$bmi->result()."</p>";
print "<p>Result : ".$bmi->feedback()."</p>";