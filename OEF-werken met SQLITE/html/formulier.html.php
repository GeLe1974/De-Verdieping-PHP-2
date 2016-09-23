<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 23/09/16
 * Time: 09:35
 */


include_once 'includes/startHTML.inc.php';



echo "

<form action=\"new.php\" method=\"post\">

    <div class=\"row\">
        <div class=\"medium-6 columns\">
            <input type='hidden' value='".$boek['id']."'>
            <label for=\"titel\" >Titel :
                <input type=\"text\" name=\"titel\" id=\"titel\" placeholder=\"titel\" value='".$boek['titel']."' required>
            </label><label for=\"auteur\" >Auteur :
                <input type=\"text\" name=\"auteur\" id=\"auteur\" placeholder=\"auteur\" value='".$boek['auteur']." 'required>
            </label><label for=\"samenvatting\" >Samenvatting :
                <textarea name='samenvatting' id='samenvatting' cols='10' rows='10' placeholder='samenvatting'value='".$boek['samenvatting']."></textarea>
            </label>
            <input type='hidden'name='actie'value='new'>

            <hr>
            <button type=\"submit\" class=\"success button\">".$boek['knop']."</button>
        </div>

    </div>



</form>






 ";





include_once 'includes/endHTML.inc.php';

