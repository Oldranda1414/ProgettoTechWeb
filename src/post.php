<?php
require_once 'bootstrap.php';
require "base.php";

if(isUserLoggedIn($dbh)){

    //api for adding new comments
    if(isset($_GET["id"]) && isset($_POST["comment-text"]) && !empty($_POST["comment-text"])){

    }

    if(isset($_GET["id"])){

        $searchedPostId = htmlspecialchars($_GET['id']);

        //api for adding new comments
        if(isset($_POST["comment-text"])){
            if(!empty($_POST["comment-text"])){
                $dbh->addComment($searchedPostId, $_SESSION["user_id"], htmlspecialchars($_POST["comment-text"]));
            }
            else{
                //TODO notificare l'utente che non si può fare un commento vuoto
            }
        }

        
        $templateParams["titolo"] = "Post";
        $templateParams["nome"] = "post.php";
        $templateParams["post"] = $dbh->getPostById($_SESSION["user_id"], $searchedPostId);
        $templateParams["comments"] = $dbh->getComments($searchedPostId);
    }
    else{
        //TODO if the post does not exist create page to inform post does not exist
    }
    require 'template/base.php';
}
else{
    require 'login.php';
}
?>