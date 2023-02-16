<?php
require_once 'bootstrap.php';

if(isUserLoggedIn($dbh)){
    $templateParams["titolo"] = "Esplora";
    $templateParams["nome"] = "explore.php";
    $templateParams["post"] = $dbh->getFullPosts(8);
    //TODO update date with todays date
    $templateParams["mostLikedPosts"] = $dbh->getFullMostLikedPosts("02/08/2022", 3);
    require 'template/base.php';
}
else{
    require 'login.php';
}
?>