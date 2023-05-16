<?php
require_once 'bootstrap.php';

if(isUserLoggedIn($dbh)){
    $templateParams["titolo"] = "Mio profilo";
    $templateParams["nome"] = "myProfile.php";
    $templateParams["posts"] = $dbh->getPostsAndCommentsByUser($_SESSION['username'], 8);
    $templateParams["user"] = $dbh->getUserInfo($_SESSION['username'])[0];
    require 'template/base.php';
}
else{
    require 'login.php';
}
?>