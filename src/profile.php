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
            $templateParams["user"] = $dbh->getUserByUsername($searchedUser);
            $templateParams["posts"] = $dbh->getFullPostsByUser($templateParams["user"][0]["User_id"]);
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