<?php
require_once 'bootstrap.php';

if(isUserLoggedIn($dbh)){
    $templateParams["titolo"] = "Mio profilo";
    $templateParams["nome"] = "myProfile.php";
    $templateParams["posts"] = $dbh->getPostsAndCommentsByUser($_SESSION['username'], 8);
    $templateParams["user"] = $dbh->getUserInfo($_SESSION['username'])[0];
    $templateParams["likes"] = $dbh->getUserLikes($_SESSION['username']);
    $templateParams["comments"] = $dbh->getUserComments($_SESSION['username']);
    $templateParams["followers"] = $dbh->getUserFollowers($_SESSION['username']);
    $templateParams["followed"] = $dbh->getUserFollowed($_SESSION['username']);
    require 'template/base.php';
}
else{
    require 'login.php';
}
?>