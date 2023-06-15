<?php
require_once 'bootstrap.php';
require "base.php";

if (isUserLoggedIn($dbh)) {

    //api for search result explenation
    if(isset($_GET["search"]) && isset($_GET["flexRadioDefault"])){
        if($_GET["flexRadioDefault"] != "ptag"){
            $templateParams["searchData"]["type"] = $_GET["flexRadioDefault"];
            $templateParams["searchData"]["words"] = $_GET["search"];
        }
        else{
            $templateParams["preciseSearch"] = "Ecco i post con il tag '".str_replace("_"," ", $_GET["search"])."'";
        }
    }

    $templateParams["titolo"] = "Esplora";
    $templateParams["nome"] = "explore.php";
    //TODO update date with todays date using {date("y-m-d")}
    $templateParams["mostLikedPosts"] = $dbh->getMostLikedPosts($_SESSION['user_id'], "2022-01-07", 3);
    array_push($templateParams["js"], "js/explore.js", "js/posts.js", "https://unpkg.com/axios/dist/axios.min.js");
    require 'template/base.php';
} else {
    require 'login.php';
}
?>