<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 28/09/16
 * Time: 15:32
 */

$message = "";
$success = false;

if ($_POST) {
    if (isset($_FILES['photo']) and $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        if ($_FILES['photo']['type'] != 'image/jpeg') {
            $message = "<p class=\"alert alert-danger\">Enkel JPG afbeeldingen!</p>";
        } elseif (!move_uploaded_file($_FILES['photo']['tmp_name'], 'photos/' . basename($_FILES['photo']['name']))) {
            $message = "<p class=\"alert alert-danger\">Er was een probleem bij het uploaden van de afbeelding! <br> {$_FILES['photo']['error']}</p>";
    } else {
            $message = "<p class=\"alert alert-success\">Het uploaden is gelukt!</p>";
            $success = true;
        }
    } else {
        switch ($_FILES['photo']['error']) {
            case UPLOAD_ERR_INI_SIZE:
                $message = "<p class=\"alert alert-danger\">De afbeelding is groter dan de server toelaat!</p>";
                break;

            case UPLOAD_ERR_FORM_SIZE:
                $message = "<p class=\"alert alert-danger\">Het formulier is groter dan het script toelaat!</p>";
                break;

            case UPLOAD_ERR_NO_FILE:
                $message = "<p class=\"alert alert-danger\">Er werd geen afbeelding verzonden! Zorg ervoor dat een afbeelding geselecteerd is!</p>";
                break;

            default:
                $message = "<p class=\"alert alert-warning\">Contacteer de serverbeheerder voor hulp.</p>";
                break;
        }
    }
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Afbeelding uploaden</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

<?= $message ?>

<?php if (!$success): ?>

    <div class="jumbotron">
    	<div class="container">
    		<h1>Afbeelding uploaden</h1>
    		<p>Vul je naam in, selecteer een afbeelding en klik op <strong>Upload afbeelding</strong></p>

    	</div>
    </div>

    <div class="container">

        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <form class="form-group" method="post" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="500000">

                <label  for="visitorName">Name</label>
                <input class="form-control" type="text" name="visitorName" id="visitorName"> <br>

                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo"> <br><br>

                <input type="submit" value="Upload afbeelding">
            </form>
            <?php else: ?>
                <h1>Bedankt!</h1>
                <p>Bedankt voor het zenden van de afbeelding, <?= (isset($_POST['visitorName'])) ? $_POST['visitorName'] : 'John Doe' ?>!</p>

                <p>
                    Afbeelding: <?= basename($_FILES['photo']['name']) ?>
                </p>

                <p>
                    <img src="./photos/<?= $_FILES['photo']['name'] ?>" alt="Afbeelding">
                </p>
            <?php endif ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    </div>




    </div>





</body>
</html>