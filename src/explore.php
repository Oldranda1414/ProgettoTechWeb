<?php
require_once 'bootstrap.php';

if(isUserLoggedIn()){
    $templateParams["titolo"] = "Esplora";
    $templateParams["nome"] = "explorepost.php";
    $templateParams["post"] = $dbh->getFullPosts(6);
    require 'template/base.php';
}
else{
    require 'login.php';
}
?>