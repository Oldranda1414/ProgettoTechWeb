<?php
require_once 'bootstrap.php';
require "base.php";

if(isUserLoggedIn($dbh)){
    if(isset($_GET["search"]) && isset($_GET["flexRadioDefault"]) && !empty($_GET["search"])){
        if($_GET["flexRadioDefault"] == "post"){
            $templateParams["posts"] = $dbh->getPostsByWords($_SESSION['user_id'], $_GET["search"],0,5);
        }
        else if($_GET["flexRadioDefault"] == "tag"){
            $templateParams["posts"] = $dbh->getPostsByGameName($_SESSION['user_id'], $_GET["search"],0,5);
        }
        else if($_GET["flexRadioDefault"] == "user"){
            $templateParams["posts"] = $dbh->getPostsByUsername($_SESSION['user_id'], $_GET["search"],0,5);
        }
    }
    else{
        $templateParams["posts"] = $dbh->getLatestNPosts($_SESSION['user_id'], 0,8);
    }
    $templateParams["titolo"] = "Esplora";
    $templateParams["nome"] = "explore.php";
    //TODO update date with todays date using {date("y-m-d")}
    $templateParams["mostLikedPosts"] = $dbh->getMostLikedPosts($_SESSION['user_id'], "2022-01-07", 3);
    array_push($templateParams["js"], "js/explore.js");
    require 'template/base.php';
}
else{
    require 'login.php';
}
?>