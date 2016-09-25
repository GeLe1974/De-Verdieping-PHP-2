<?php

include_once "includes/config.inc.php";



include_once "includes/startHTML.inc.php";

?>

<div class="row">
  <div class="col-md-8 mainContent">

        <blockquote>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda at beatae eum ex iure magnam optio quaerat quibusdam ratione, sint!</p>
          <footer>As told by <cite title="Source Title">Bert</cite></footer>
          <div class="editLinks">
            <a href="editQuote.php?id=2"><i class="glyphicon glyphicon-pencil"></i></a>
            <a href="deleteQuote.php?id=2"><i class="glyphicon glyphicon-remove"></i></a>
          </div>
        </blockquote>

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