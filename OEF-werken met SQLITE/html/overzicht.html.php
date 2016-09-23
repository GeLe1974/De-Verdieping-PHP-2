<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 23/09/16
 * Time: 09:35
 */


include_once 'includes/startHTML.inc.php';



echo "

<div class=\"row\">
    <div class=\"large-3 columns\"><!-- ... --></div>
    <div class=\"large-6 columns\">";



foreach ($boeken as $boek) {
    echo "  <div class=\"callout secondary\">
            <span>".$boek['titel']."</span> van <span>".$boek['auteur']."</span>
            <form class='button-group tiny float-right'>
                <input type = 'hidden' name='id' value='" . $boek['id'] . "' >
                <button class='tiny button  alert'   type='submit' formaction='delete.php' formmethod='post' ><i class='fa fa-trash'></i></button>
                <button class='tiny button  warning' type='submit' formaction='edit.php'   formmethod='post' ><i class='fa fa-pencil'></i></button>
                <button class='tiny button  success' type='submit' formaction='detail.php' formmethod='post' ><i class='fa fa-search'></i></button>
            </form>

        </div>

   ";

};


echo "
    </div>
    <div class=\"large-3 columns\"><!-- ... --></div>
</div>
";





include_once 'includes/endHTML.inc.php';

