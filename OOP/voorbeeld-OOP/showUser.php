<?php
require_once 'User.php';

$user = User::getById($_GET['id']);

?>

<a href="listUsers.php">Terug naar lijst</a>

<h1>Uw gekozen user: <?= $user->getUsername() ?></h1>
<p>id : <?= $user->getId() ?> </p>
