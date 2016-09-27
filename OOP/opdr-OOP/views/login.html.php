<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 26/09/16
 * Time: 11:29
 */



echo "

<form class=\"form-horizontal\" action='login.php' method='post'>
<fieldset>
<!-- Form Name -->
<div class='row'><div class='col-md-4'></div>
<div class='col-md-4'><legend class=''>Login</legend></div>
<div class='col-md-4'></div></div>




<!-- Text input-->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"username\">Username</label>
  <div class=\"col-md-4\">
  <input id=\"username\" name=\"username\" placeholder=\"email@email.com\" class=\"form-control input-md\" required=\"\" type=\"text\">
  <span class=\"help-block\"></span>
  </div>
</div>

<!-- Password input-->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"password\">Password</label>
  <div class=\"col-md-4\">
    <input id=\"password\" name=\"password\" placeholder=\"password\" class=\"form-control input-md\" required=\"\" type=\"password\">
    <span class=\"help-block \"></span>
  </div>
</div>

<!-- Button -->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"button\"></label>
  <div class=\"col-md-4\">
    <button type='submit' id=\"button\" name=\"button\" class=\"btn btn-primary\">Submit</button>
  </div>
</div>

</fieldset>
</form>

";


