<?php
require_once 'bootstrap.php';

if(isUserLoggedIn($dbh)){
    $templateParams["titolo"] = "Mio profilo";
    $templateParams["nome"] = "myProfile.php";
    $templateParams["user"] = $dbh->getUser($_SESSION['user_id']);
    $templateParams["posts"] = $dbh->getFullPostsByUser($templateParams["user"][0]["User_id"]);
    require 'template/base.php';
}
else{
    require 'login.php';
}
?>