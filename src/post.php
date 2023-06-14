<?php
require_once 'bootstrap.php';
require "base.php";

if(isUserLoggedIn($dbh)){

    if(isset($_GET["id"])){

        $searchedPostId = htmlspecialchars($_GET['id']);

        //api for adding new comments
        if(isset($_POST["comment-text"])){
            if(!empty($_POST["comment-text"])){
                $dbh->addComment($searchedPostId, $_SESSION["user_id"], htmlspecialchars($_POST["comment-text"]));
            }
            else{
                $templateParams["commentError"] = "Non si può fare un commento vuoto";
            }
        }

        
        $templateParams["titolo"] = "Post";
        $templateParams["nome"] = "post.php";
        $templateParams["post"] = $dbh->getPostById($_SESSION["user_id"], $searchedPostId);
        if(!empty($templateParams["post"])){
            $templateParams["post"] = $templateParams["post"][0];
        }
        $templateParams["comments"] = $dbh->getComments($searchedPostId);
    }
    require 'template/base.php';
}
else{
    require 'login.php';
}
?>