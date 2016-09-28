<?php



include_once 'includes/config.inc.php';

if (isset($_GET['id'])){
    $quote = Quote::findById($_GET['id']);
    $quote->delete();

}
header('location: index.php');
exit;