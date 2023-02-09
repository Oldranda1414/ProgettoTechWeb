<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Esplora";
$templateParams["nome"] = "explorepost.php";
$templateParams["post"] = $dbh->getFullPosts(6);
require 'template/base.php';
?>