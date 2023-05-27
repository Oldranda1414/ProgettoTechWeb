<?php
require_once 'bootstrap.php';
require "base.php";

if(isUserLoggedIn($dbh)){
    $templateParams["titolo"] = "Home";
    $templateParams["nome"] = "home.php";
    $templateParams["posts"] = $dbh->getLatestPostsAndComments(8);
    require 'template/base.php';
}
else{
    require 'login.php';
}

?>