<?php
require_once 'bootstrap.php';
require "base.php";

if(isUserLoggedIn($dbh)){
    $templateParams["titolo"] = "Esplora";
    $templateParams["nome"] = "explore2.php";
    //TODO update date with todays date using {date("y-m-d")}
    $templateParams["mostLikedPosts"] = $dbh->getMostLikedPosts("2022-01-07", 3);
    array_push($templateParams["js"], "js/explore.js", "js/posts-home.js", "https://unpkg.com/axios/dist/axios.min.js");
    require 'template/base.php';
}
else{
    require 'login.php';
}
?>