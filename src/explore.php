<?php
require_once 'bootstrap.php';
require "base.php";

if(isUserLoggedIn($dbh)){
    $templateParams["titolo"] = "Esplora";
    $templateParams["nome"] = "explore.php";
    $templateParams["posts"] = $dbh->getLatestPostsAndComments(8);
    //TODO update date with todays date using {date("y-m-d")}
    $templateParams["mostLikedPosts"] = $dbh->getMostLikedPostsAndComments("2022-01-07", 3);
    array_push($templateParams["js"], "js/explore.js");
    //$templateParams["js"] = array("js/explore.js");
    require 'template/base.php';
}
else{
    require 'login.php';
}
?>