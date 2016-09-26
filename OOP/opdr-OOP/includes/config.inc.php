<?php
session_start();

include_once 'classes/Auth.php';
include_once 'classes/Weigth.php';


/*
 * Database gegevens
 * kies voor CONN_TYPE :
 *      1. 'sqlite' voor SQLITE-databases
 *      2. 'mysql' voor MySQL-databases
 * geef voor DBNAME het volledige pad tov root van project indien sqlite
 */
define('CONN_TYPE' , 'sqlite');
define('DBNAME', 'data/data.sqlite');
define('DBUSER', 'root');
define('DBPASS', 'root');
