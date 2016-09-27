<?php

include_once 'includes/config.inc.php';



/*
//Auth::registerUser('user','ww');
$uitkomst = Auth::login('uer','ww');

if($uitkomst === true){
    echo'login gelukt <br>';

}else{

    echo $uitkomst;
}



*/



/*
check if user is logged in
*/

if(!empty($_SESSION['username'])){


    //Auth::logout();
    echo" User <b>" .$_SESSION['username'] ."</b> is ingelogd";

}else{

    header('location: login.php');

}