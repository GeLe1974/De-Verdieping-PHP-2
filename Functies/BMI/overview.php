<?php

include_once 'includes/config.inc.php';

$results = getAllData();

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BMI: overview</title>
</head>
<body>
  <h1>BMI: Overview</h1>
  <a href="index.php">Add BMI</a>
  <hr/>

  <?php if (count($results)): ?>
    <table>
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Weight</th>
        <th>Length</th>
        <th>Result</th>
      </tr>
      <?php foreach ($results as $bmi): ?>
        <tr>
          <td>
            <?= $bmi['name'] . ' ' . $bmi['surname'] ?>
          </td>
          <td>
            <?= $bmi['age'] ?>
          </td>
          <td>
            <?= $bmi['weight'] ?>
          </td>
          <td>
            <?= $bmi['length'] ?>
          </td>
          <td>
            <a href="bmi-result.php?id=<?= $bmi['id'] ?>">View result</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php else: ?>
    <p>There were no entries found.</p>
  <?php endif; ?>


</body>
</html>