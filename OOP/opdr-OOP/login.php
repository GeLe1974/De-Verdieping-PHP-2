<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 26/09/16
 * Time: 11:31
 */

include_once 'includes/config.inc.php';







if(!empty($_POST)) {

    Auth::login($_POST['username'],$_POST['password']);

    //var_dump($_POST);
}else {

    include_once 'includes/startHTML.inc.php';

    include_once 'views/login.html.php';

    include_once 'includes/endHTML.inc.php';

}


