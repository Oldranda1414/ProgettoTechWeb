<?php
require_once 'bootstrap.php';
require "base.php";

if(isUserLoggedIn($dbh)){
    $templateParams["titolo"] = "Esplora";
    $templateParams["nome"] = "explore.php";
    //TODO update date with todays date using {date("y-m-d")}
    $templateParams["mostLikedPosts"] = $dbh->getMostLikedPosts($_SESSION['user_id'], "2022-01-07", 3);
    array_push($templateParams["js"], "js/explore.js", "js/posts.js", "https://unpkg.com/axios/dist/axios.min.js");
    require 'template/base.php';
}
else{
    require 'login.php';
}
?>