<?php
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
    if(isset($_POST["like_button"])){
        parse_str($_POST["like_button"], $likeButtonAction);
        var_dump($likeButtonAction);
        if($likeButtonAction["type"] == "add"){
            $dbh->addLike($likeButtonAction["postId"], $likeButtonAction["userId"]);
        }
        else if($likeButtonAction["type"] = "remove"){
            $dbh->removeLike($likeButtonAction["postId"], $likeButtonAction["userId"]);
        }
    }
    $templateParams["notifications"] = $dbh->getNotifications($_SESSION['username']);
    $templateParams["user"] = $dbh->getUserInfo($_SESSION['username'])[0];
    $templateParams["js"] = array("https://code.jquery.com/jquery-3.6.0.min.js", "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js", "js/base.js");
?>