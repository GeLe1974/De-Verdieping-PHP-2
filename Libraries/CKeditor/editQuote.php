<?php

include_once "includes/config.inc.php";

if (isset($_GET['id'])) {
  $quote = Quote::findById($_GET['id']);

  if ($_POST) {
    // aanpassen
    $quote->setName($_POST['name']);
    $quote->setQuote($_POST['quote']);
    $formerrors = $quote->validate();

    if (empty($formerrors)) {
      $quote->save();
      header('location:eerstePDF.php');
      exit;
    }
  }
}

if (!isset($quote) or !$quote) {
  header("location: eerstePDF.php");
  exit;
}


include_once "includes/startHTML.inc.php";

?>

<div class="row">
  <div class="col-md-8 mainContent">

    <form action="<?= $_SERVER['PHP_SELF'] . "?id=" . $_GET['id'] ?>" method="post">
      <?php include "includes/quoteForm.inc.php" ?>

      <div class="form-group">
        <input type="submit" value="Aanpassen" class="btn btn-success" class="form-control" />
      </div>
    </form>

  </div>

  <div class="col-md-4 sidebar">
    <a href="index.php" class="btn btn-info pull-right">Back to list</a>
  </div>
</div>


<?php include_once "includes/endHTML.inc.php"; ?>
