<?php
require_once 'bootstrap.php';

if(isUserLoggedIn($dbh)){
    if(isset($_GET["Username"])){
        //check if the requested user profile is the current user's profile
        if($_GET["Username"] == $_SESSION['username']){
            header('Location: ./myProfile.php');
        }
        else{
            $searchedUser = htmlspecialchars($_GET['Username']);
            $templateParams["titolo"] = "Profilo di ".$searchedUser;
            $templateParams["nome"] = "profile.php";
            $templateParams["posts"] = $dbh->getPostsAndCommentsByUser($searchedUser, 8);
            $templateParams["user"] = $dbh->getUser($_SESSION['username'])[0];
        }
    }
    else{
        //TODO if the user does not exist or is not set create a new page informing the current user
    }
    require 'template/base.php';
}
else{
    require 'login.php';
}
?>