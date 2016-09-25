<?php

include_once "includes/config.inc.php";

if($_POST){
    $quote = new Quote($_POST);
    $formerrors=$quote->validate();
    if(empty($formerrors)){
        $quote->save();
        unset($quote);
    }
}

$quotes= Quote::getAll(['orderby'=>'id DESC']);

//$quotes = new Quote();
//$quotes->getAll(['orderby'=>'id DESC']);


include_once "includes/startHTML.inc.php";

?>

<div class="row">
  <div class="col-md-8 mainContent">

      <?php if (count($quotes)): ?>
          <?php foreach ($quotes as $q): ?>
              <blockquote>
                  <p><?= $q->getQuote(); ?></p>
                  <footer>As told by <cite title="Source Title"><?= $q->getName(); ?></cite></footer>
                  <div class="editLinks">
                      <a href="editQuote.php?id=<?= $q->getId() ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                      <a href="deleteQuote.php?id=<?= $q->getId() ?>"><i class="glyphicon glyphicon-remove"></i></a>
                  </div>
              </blockquote>
          <?php endforeach; ?>
      <?php else: ?>
          <p>Er werden geen quotes gevonden.</p>
      <?php endif; ?>

  </div>

  <div class="col-md-4 sidebar">
    <h2>Add quote</h2>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
      <?php include "includes/quoteForm.inc.php" ?>

      <div class="form-group">
        <input type="submit" value="Toevoegen" class="btn btn-success" class="form-control" />
      </div>
    </form>
  </div>
</div>

<?php include_once "includes/endHTML.inc.php"; ?>