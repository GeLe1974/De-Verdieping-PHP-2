<?php
require_once 'User.php';
$users = User::getAllUsers();

?>

<a href="addUser.php">User toevoegen</a>
<h1>Users</h1>
<ul>
<?php foreach($users as $user): ?>
<li><a href="showUser.php?id=<?= $user->getId() ?>"><?= $user->getUsername() ?></a> : <?= $user->getPassword() ?></li>
<?php endforeach ?>
</ul>

