<?php
require_once 'bootstrap.php';
require "base.php";

if(isUserLoggedIn($dbh)){
    $templateParams["titolo"] = "Mio profilo";
    $templateParams["nome"] = "myProfile2.php"; 
    $templateParams["likes"] = $dbh->getUserLikes($_SESSION['username']);
    $templateParams["comments"] = $dbh->getUserComments($_SESSION['username']);
    $templateParams["followers"] = $dbh->getUserFollowers($_SESSION['username']);
    $templateParams["followed"] = $dbh->getUserFollowed($_SESSION['username']);
    $templateParams["js"] = array ("https://unpkg.com/axios/dist/axios.min.js", "js/changePassword.js", "js/posts-home.js");
    require 'template/base.php';
}
else{
    require 'login.php';
}
?>