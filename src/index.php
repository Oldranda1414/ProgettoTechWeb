<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Progetto - Home";
$templateParams["nome"] = "index.php";
$templateParams["post"] = $dbh->getPosts(6);
foreach($templateParams["post"] as $post){
    $user = $dbh->getUser($post["User_id"]);
    $post["Username"] = $user[0]["Username"];
    $post["UserProfilePic"] = $user[0]["Immagine"];
    $post["Tag"] = $dbh->getTag($post["Tag_id"])[0];
}


require 'template/base.php';
?>