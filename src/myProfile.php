<?php
require_once 'bootstrap.php';
require "base.php";

if (isUserLoggedIn($dbh)) {

    //update password api
    if (isset($_POST["newp"]) || isset($_POST["p"])) {
        if (!empty($_POST["newp"]) || !empty($_POST["p"])) {
            list($result, $errorMsg) = $dbh->secureLoginUser($_SESSION["username"], $_POST["p"]);
            if ($result != 0) {
                $dbh->updatePassword($_SESSION['user_id'], $_POST["newp"]);
                $templateParams["successWords"] = "La password è stata modificata correttamente";                                               //this is set to activate the change passord correct toast
            } else {
                if ($errorMsg == "accountDisabled") {
                    $templateParams["errorToast"]["warningWords"] = "Password non cambiata";
                    $templateParams["errorToast"]["words"] = "L'account è stato disabilitato per troppi tentativi falliti. Riprovare tra un po";
                } else if ($errorMsg == "passwordWrong") {
                    $templateParams["errorToast"]["warningWords"] = "Password non cambiata";
                    $templateParams["errorToast"]["words"] = "La password inserita non è corretta. Inserire la password corrente";
                } else if ($errorMsg == "userDoesNotExist") {
                    $templateParams["errorToast"]["warningWords"] = "Password non cambiata";
                    $templateParams["errorToast"]["words"] = "L'utente richiesto non esiste";
                }
            }
        } else {
            $templateParams["errorToast"]["warningWords"] = "Password non cambiata";
            $templateParams["errorToast"]["words"] = "Alcuni campi sono vuoti. Riempire tutti i campi";
        }
    }


    //update profile img api
    if (isset($_FILES["updateProfileImg"])) {
        if (strlen($_FILES["updateProfileImg"]["name"]) > 0) {
            //deleting old img from server
            deleteImg(UPLOAD_DIR . "profiles/" . $templateParams["user"]["Profile_img"]);
            //uploading new profile img
            list($imgUploadResult, $imgUploadMsg) = uploadImage(UPLOAD_DIR . "profiles/", $_FILES["updateProfileImg"]);
            if ($imgUploadResult != 0) {
                //updating db
                $dbh->updateProfileImg($_SESSION["user_id"], $imgUploadMsg);
                $templateParams["successWords"] = "L'immagine di profilo è stata modificata correttamente";                                //this is set to activate the change img correct toast
                //updating $templateParams["user"]
                $templateParams["user"]["Profile_img"] = $_FILES["updateProfileImg"]["name"];
            } else {
                $templateParams["errorToast"]["warningWords"] = "Immagine profilo non cambiata";
                $templateParams["errorToast"]["words"] = "Errore caricamento immagine: " . $imgUploadMsg;
            }
        } else {
            $templateParams["errorToast"]["warningWords"] = "Immagine profilo non cambiata";
            $templateParams["errorToast"]["words"] = "Nuova immagine di profilo non selezionata. Selezionare una nuova immagine di profilo";
        }
    }
    $templateParams["titolo"] = "Mio profilo";
    $templateParams["nome"] = "myProfile.php";
    $templateParams["likes"] = $dbh->getUserLikes($_SESSION['username']);
    $templateParams["comments"] = $dbh->getUserComments($_SESSION['username']);
    $templateParams["followers"] = $dbh->getUserFollowers($_SESSION['username']);
    $templateParams["followed"] = $dbh->getUserFollowed($_SESSION['username']);
    array_push($templateParams["js"], "https://unpkg.com/axios/dist/axios.min.js", "js/posts.js", "js/myProfile.js", "js/sha512.js");
    require 'template/base.php';
} else {
    require 'login.php';
}
?>