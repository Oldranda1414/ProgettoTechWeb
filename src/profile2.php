<?php
require_once 'bootstrap.php';
require "base.php";

if(isUserLoggedIn($dbh)){
    if(isset($_GET["Username"])){
        //check if the requested user profile is the current user's profile
        if($_GET["Username"] == $_SESSION['username']){
            header('Location: ./myProfile.php');
        }
        else{
            if(isset($_POST["follow-data"])){
                parse_str(html_entity_decode(htmlspecialchars($_POST["follow-data"])), $followData);
                if($followData["type"] == "follow"){
                    $dbh->addFollower($_SESSION["user_id"], $followData["followedUserId"]);
                }
                else if($followData["type"] == "unfollow"){
                    $dbh->removeFollower($_SESSION["user_id"], $followData["followedUserId"]);
                }
            }
            $searchedUser = htmlspecialchars($_GET['Username']);
            $templateParams["titolo"] = "Profilo di ".$searchedUser;
            $templateParams["nome"] = "profile2.php";
            $templateParams["searchedUser"] = $dbh->getUserInfo($_SESSION['user_id'], $searchedUser)[0];
            $templateParams["likes"] = $dbh->getUserLikes($searchedUser);
            $templateParams["comments"] = $dbh->getUserComments($searchedUser);
            $templateParams["followers"] = $dbh->getUserFollowers($searchedUser);
            $templateParams["followed"] = $dbh->getUserFollowed($searchedUser);
            array_push($templateParams["js"],"https://unpkg.com/axios/dist/axios.min.js","js/posts.js","js/profile.js");
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