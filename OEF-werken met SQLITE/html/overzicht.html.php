<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 23/09/16
 * Time: 09:35
 */


include_once 'includes/startHTML.inc.php';



echo " <h1> Hello ! </h1>


 <div class=\"top-bar\">
  <div class=\"top-bar-left\">
    <ul class=\"dropdown menu\" data-dropdown-menu>
      <li class=\"menu-text\">Site Title</li>
      <li>
        <a href=\"#\">One</a>
        <ul class=\"menu vertical\">
          <li><a href=\"#\">One</a></li>
          <li><a href=\"#\">Two</a></li>
          <li><a href=\"#\">Three</a></li>
        </ul>
      </li>
      <li><a href=\"#\">Two</a></li>
      <li><a href=\"#\">Three</a></li>
    </ul>
  </div>
  <div class=\"top-bar-right\">
    <ul class=\"menu\">
      <li><input type=\"search\" placeholder=\"Search\"></li>
      <li><button type=\"button\" class=\"button\">Search</button></li>
    </ul>
  </div>
</div>

 ";





include_once 'includes/endHTML.inc.php';

