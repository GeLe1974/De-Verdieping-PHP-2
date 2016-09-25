<?php
include_once 'includes/config.inc.php';


// Als formulier verzonden werd
if ($_POST) {

  // Databank connectie maken en variabelen initialiseren

  $data = $_POST;


  // Elementen valideren
  $formErrors = validateData($data);

  // Toevoegen aan DB indien geen foutmeldingen
  if (empty($formErrors)) {
    $result = addData($data);

    if ($result) {
      $_SESSION['message'] = ['msg' => 'BMI added.', 'type' => 'success'];
      header('location: bmi-result.php?id='.$result);
      exit;
    } else {
      $_SESSION['message'] = ['msg' => 'Something went wrong...', 'type' => 'danger'];
    }
  }

}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BMI index</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <h1>BMI</h1>
  <a href="overview.php">Go to overview</a>
  <hr/>

  <?php if (!empty($formErrors)): ?>
    <ul>
    <?php foreach ($formErrors as $error): ?>
      <li class="formerror"><?= $error ?></li>
    <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <form method="post">
    Name: <br/>
    <input type="text" name="name" id="name" value="<?= (isset($data['name']))?$data['name']:'' ?>"/> <br/><br/>
    Surname: <br/>
    <input type="text" name="surname" id="surname" value="<?= (isset($data['surname']))?$data['surname']:'' ?>"/> <br/><br/>
    Age: <br/>
    <input type="number" name="age" id="age" value="<?= (isset($data['age']))?$data['age']:'' ?>"/> <br/><br/>
    Weight: <br/>
    <input type="number" name="weight" id="weight" value="<?= (isset($data['weight']))?$data['weight']:'' ?>"/> <br/><br/>
    Length: (in cm) <br/>
    <input type="number" name="length" id="length" value="<?= (isset($data['length']))?$data['length']:'' ?>"/> <br/><br/>

    <input type="submit" value="Bereken"/>

    <span class="info">
      Alle berekende BMI's worden in de databank bewaard.
    </span>
  </form>

</body>
</html>