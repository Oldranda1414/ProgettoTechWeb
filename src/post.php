<?php
require_once 'bootstrap.php';
require "base.php";

if(isUserLoggedIn($dbh)){
    if(isset($_GET["id"])){
        $searchedPostId = htmlspecialchars($_GET['id']);
        $templateParams["titolo"] = "Post";
        $templateParams["nome"] = "post.php";
        $templateParams["post"] = $dbh->getPostById($searchedPostId);
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