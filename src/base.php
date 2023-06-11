<?php
var_dump($_POST);
    //api for adding a new post
    if(isset($_POST["tagNewPost"]) || isset($_POST["textNewPost"]) || isset($_FILES["fileNewPost"])){
        if(!empty($_POST["tagNewPost"]) && !empty($_POST["textNewPost"])){
            if(strlen($_FILES["fileNewPost"]["name"])>0){
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

    //api for deleting notifications
    if(isset($_POST["deleteNotifications"])){
        $dbh->removeNotifications($_SESSION["user_id"]);
    }

    //api for like button
    if(isset($_POST["like_button"])){
        parse_str(html_entity_decode(htmlspecialchars($_POST["like_button"])), $likeButtonAction);
        if($likeButtonAction["type"] == "add"){
            var_dump($likeButtonAction);
            $dbh->addLike($likeButtonAction["postId"], $_SESSION["user_id"]);
        }
        else if($likeButtonAction["type"] = "remove"){
            $dbh->removeLike($likeButtonAction["postId"], $_SESSION["user_id"]);
        }
    }

    $templateParams["notifications"] = $dbh->getNotifications($_SESSION['username']);
    $templateParams["user"] = $dbh->getCurrentUserInfo($_SESSION['user_id'])[0];
    $templateParams["js"] = array("https://code.jquery.com/jquery-3.6.0.min.js", "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js", "js/base.js");
?>