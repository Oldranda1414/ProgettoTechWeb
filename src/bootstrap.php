<?php

define("UPLOAD_DIR", "./upload/");
define("HOST", "localhost");
define("USER", "admin");
define("PASSWORD", "5MsJ6E7vcgTKuK4ddJsy4wpa");
define("DATABASE", "sb_life_and_games"); 

require_once("utils/functions.php");
require_once("db/database.php");

sec_session_start();
$dbh = new DatabaseHelper(HOST, USER, PASSWORD, DATABASE, 3306);
?>