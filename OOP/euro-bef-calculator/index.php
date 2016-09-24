<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 24/09/16
 * Time: 19:12
 */

require 'EuroCalc.php';
$amount = 2000;
$calc = new EuroCalc($amount);
$euro = $calc->toEuro();
print "<p>$amount BEF is omgerekend $euro EUR.</p>";

$amount = 25;
$calc = new EuroCalc($amount);
$bef = $calc->toBef();
print "<p>$amount EUR is omgerekend $bef BEF.</p>";

$calc = new EuroCalc(4000);
print "4000 BEF = " . $calc->toEuro() . " EUR <br>";
print "4000 EUR = " . $calc->toBef() . " BEF <br>";