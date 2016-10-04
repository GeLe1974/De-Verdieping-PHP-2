<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 28/09/16
 * Time: 15:32
 */


echo "<form action=\"upload.php\" method=\"post\" enctype=\"multipart/form-data\">
 <input type=\"file\" name=\"myFile\">
 <br>
 <input type=\"submit\" value=\"Upload\">
</form>";

if(!empty($_FILES)){

    $gelukt = upload("myFile");
    if($gelukt){
        echo"<p>File upload gelukt !</p>";

    }

}


function upload($file) {


    $dir = __DIR__;
    define("UPLOAD_DIR", $dir."/uploads");

    $result = true;

    if (!empty($_FILES["$file"])) {
        $myFile = $_FILES["$file"];
        if ($myFile['error'] !== UPLOAD_ERR_OK) {
            echo'nest';
            $result = false;
        }
    }


// clean filename

    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile['name']);

// add number if filename exists

    $i = 0;
    $parts = pathinfo($name);

    while (file_exists((UPLOAD_DIR . $name))) {
        $i++;
        $name = $parts['filename'] . "-" . $i . "." . $parts['extension'];

    }

// move file with tmp_name from tempfolder to uploadfolder with new name

    $success = move_uploaded_file($myFile["tmp_name"], "uploads/". $name);

    if (!$success) {
        $result = '';
    }
    unset($_FILES);
    return $result;

}