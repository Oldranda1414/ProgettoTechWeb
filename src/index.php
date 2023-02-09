<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Progetto - Home";
$templateParams["nome"] = "home.php";
$templateParams["post"] = $dbh->getFullPosts(6);
require 'template/base.php';
?>