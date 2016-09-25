<?php
include_once 'includes/config.inc.php';


if (isset($_GET['id'])) {
  // Als er een ID in de URL zit zoeken we de gegevens op in de databank

  $id = $_GET['id'];
  $bmi_data = getDataByID($id);


} else {
  // Als er niets doorgestuurd werd
  header('location: index.php');
  exit;

}

// BMI = gewicht / (lengte*lengte)

$length = $bmi_data['length'];
$weight = $bmi_data['weight'];
$bmi = calculateBmi($length,$weight);

// BMI Feedback geven

$result = getBmiResult($bmi);

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BMI: result</title>
</head>
<body>
  <h1>BMI: result</h1>
  <a href="index.php">Back to form</a> | <a href="overview.php">Back to overview</a>
  <hr/>

  <p><strong>Hello, <?= $bmi_data['name'] . ' ' . $bmi_data['surname'] ?></strong></p>

  <h2>Your result is: <?= $bmi ?>.</h2>

  <p><strong>Result:</strong></p>

  <p class="<?= $result['class'] ?>"><?= $result['verdict'] ?></p>

</body>
</html>