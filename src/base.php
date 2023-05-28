<?php
var_dump($_POST);
    if(isset($_POST["tagNewPost"]) || isset($_POST["textNewPost"]) || isset($_POST["fileNewPost"])){
        if(!empty($_POST["tagNewPost"]) || !empty($_POST["textNewPost"]) || !empty($_POST["fileNewPost"])){
            var_dump($_FILES);
            if(isset($_FILES["fileNewPost"]) && strlen($_FILES["fileNewPost"]["name"])>0){
                echo "trying to upload new image";
                list($imgUploadResult, $imgUploadMsg) = uploadImage(UPLOAD_DIR."posts/", $_FILES["fileNewPost"]);
                if($imgUploadResult != 0){
                    $dbh->insertPost($_SESSION["user_id"], htmlspecialchars($_POST["textNewPost"]), htmlspecialchars($_POST["tagNewPost"]), $imgUploadMsg);
                    echo "file inserted correctly";
                    //TODO FILE CARICATO CORRETTAMENTE, NOTIFICARE UTENTE
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
    $templateParams["notifications"] = $dbh->getNotifications($_SESSION['username']);
    $templateParams["user"] = $dbh->getUserInfo($_SESSION['username'])[0];
?>