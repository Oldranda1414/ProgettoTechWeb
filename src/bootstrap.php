<?php
session_start();
define("UPLOAD_DIR", "./upload/");
require_once("utils/functions.php");
require_once("db/database.php");
<<<<<<< HEAD
$dbh = new DatabaseHelper("81.56.31.11", "utente", "!Progetto12345", "db_progetto_tech_web", 3306);
=======
$dbh = new DatabaseHelper("localhost", "root", "", "db_progetto_tech_web", 3306);
>>>>>>> 47aa49d52055741c977515c1ff0c6985a0c6a34e
?>