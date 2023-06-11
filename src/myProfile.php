<?php
require_once 'bootstrap.php';
require "base.php";

if(isUserLoggedIn($dbh)){

    //update profile img api
    if(isset($_POST["updateProfileImg"])){
        if(!empty($_POST["updateProfileImg"]) && isset($_FILES["updateProfileImg"]) && strlen($_FILES["updateProfileImg"]["name"])>0){
            list($imgUploadResult, $imgUploadMsg) = uploadImage(UPLOAD_DIR."posts/", $_FILES["updateProfileImg"]);
            if($imgUploadResult != 0){
                $dbh->updateProfileImg($_SESSION["user_id"], $imgUploadMsg);
            }
            else{
                //TODO ERRORE CARICAMENTO IMMAGINE, NOTIFICARE UTENTE (il tipo di errore è contenuto in $imgUploadMsg)
            }
        }
        else{
            //TODO NOTIFICARE CHE IL FILE CARICATO è VUOTO/errato
        }
    }

    $templateParams["titolo"] = "Mio profilo";
    $templateParams["nome"] = "myProfile.php";
    $templateParams["posts"] = $dbh->getPostsByUser(0, $_SESSION['username'], 0, 8);
    $templateParams["likes"] = $dbh->getUserLikes($_SESSION['username']);
    $templateParams["comments"] = $dbh->getUserComments($_SESSION['username']);
    $templateParams["followers"] = $dbh->getUserFollowers($_SESSION['username']);
    $templateParams["followed"] = $dbh->getUserFollowed($_SESSION['username']);
    array_push($templateParams["js"], "js/changePassword.js");
    require 'template/base.php';
}
else{
    require 'login.php';
}
?>