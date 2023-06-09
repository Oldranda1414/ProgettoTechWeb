<?php
require_once 'bootstrap.php';
require "base.php";

if(isUserLoggedIn($dbh)){
    if(isset($_POST["tagNewPost"]) || isset($_POST["textNewPost"]) || isset($_POST["fileNewPost"])){
        if(!empty($_POST["tagNewPost"]) || !empty($_POST["textNewPost"]) || !empty($_POST["fileNewPost"])){
            if(isset($_FILES["fileNewPost"]) && strlen($_FILES["fileNewPost"]["name"])>0){
                list($imgUploadResult, $imgUploadMsg) = uploadImage(UPLOAD_DIR."posts/", $_FILES["fileNewPost"]);
                if($imgUploadResult != 0){
                    $templateParams["newPostId"] = $dbh->insertPost($_SESSION["user_id"], htmlspecialchars($_POST["textNewPost"]), htmlspecialchars($_POST["tagNewPost"]), $imgUploadMsg);
                }
                else{
                    //TODO ERRORE CARICAMENTO IMMAGINE, NOTIFICARE UTENTE (il tipo di errore è contenuto in $imgUploadMsg)
                }
            }
            else{
                //TODO IMMAGINE NON SELEZIONATA, NOTIFICARE UTENTE
            }
        }
        else{
            //TODO ALCUNI DATI SONO VUOTI, NOTIFICARE UTENTE
        }
    }
    else{
        //TODO DATI NON INSERITI, NOTIFICARE UTENTE
    }
    $templateParams["titolo"] = "Esplora";
    $templateParams["nome"] = "explore.php";
    $templateParams["posts"] = $dbh->getLatestNPosts(0,8);
    //TODO update date with todays date using {date("y-m-d")}
    $templateParams["mostLikedPosts"] = $dbh->getMostLikedPosts("2022-01-07", 3);
    array_push($templateParams["js"], "js/explore.js");
    require 'template/base.php';
}
else{
    require 'login.php';
}
?>