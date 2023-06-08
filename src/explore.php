<?php
require_once 'bootstrap.php';
require "base.php";

if(isUserLoggedIn($dbh)){
    $templateParams["titolo"] = "Esplora";
    $templateParams["nome"] = "explore.php";
    $templateParams["posts"] = $dbh->getLatestNPosts(0,8);
    //TODO update date with todays date using {date("y-m-d")}
    $templateParams["mostLikedPosts"] = $dbh->getMostLikedPosts("2022-01-07", 3);
    array_push($templateParams["js"], "js/explore.js");
    require 'template/base.php';
}
else{
    require 'login.php';
}
?>