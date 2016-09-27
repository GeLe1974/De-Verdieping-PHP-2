<?php
require_once 'User.php';

if($_POST){
    $user = new User($_POST['username'],$_POST['password']);
    $user->save();

    header('location: listUsers.php');
    exit;
}

?>

<form method="post">
    <p>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
    </p>
    <p>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
    </p>
    <p>
        <input type="submit" value="Add user">
    </p>
</form>
