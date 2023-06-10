<?php
require_once 'bootstrap.php';
require "base.php";

if(isUserLoggedIn($dbh)){
    $templateParams["titolo"] = "Mio profilo";
    $templateParams["nome"] = "myProfile.php";
    $templateParams["posts"] = $dbh->getPostsByUser(0, $_SESSION['username'], 0, 8);
    $templateParams["likes"] = $dbh->getUserLikes($_SESSION['username']);
    $templateParams["comments"] = $dbh->getUserComments($_SESSION['username']);
    $templateParams["followers"] = $dbh->getUserFollowers($_SESSION['username']);
    $templateParams["followed"] = $dbh->getUserFollowed($_SESSION['username']);
    $templateParams["js"] = array ("js/changePassword.js");
    require 'template/base.php';
}
else{
    require 'login.php';
}
?>