<?php
require_once 'bootstrap.php';
require "base.php";

if(isUserLoggedIn($dbh)){
    if(isset($_POST["search"]) && isset($_POST["flexRadioDefault"]) && !empty($_POST["search"])){
        if($_POST["flexRadioDefault"] == "post"){
            $templateParams["posts"] = $dbh->getPostsByWords($_POST["search"],0,5);
        }
        else if($_POST["flexRadioDefault"] == "tag"){
            $templateParams["posts"] = $dbh->getPostsByGameName($_POST["search"],0,5);
        }
        else if($_POST["flexRadioDefault"] == "user"){
            $templateParams["posts"] = $dbh->getPostsByUsername($_POST["search"],0,5);
        }
    }
    else{
        $templateParams["posts"] = $dbh->getLatestNPosts(0,8);
    }
    $templateParams["titolo"] = "Esplora";
    $templateParams["nome"] = "explore.php";
    //TODO update date with todays date using {date("y-m-d")}
    $templateParams["mostLikedPosts"] = $dbh->getMostLikedPosts("2022-01-07", 3);
    array_push($templateParams["js"], "js/explore.js");
    require 'template/base.php';
}
else{
    require 'login.php';
}
?>