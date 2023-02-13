<?php
require_once 'bootstrap.php';

if(isset($_POST["username"]) && isset($_POST["password"])){
    if($dbh->secureLoginUser($_POST["username"], $_POST["password"])){
        //Login riuscito
        if(isset($_POST["rememberMeCheckbox"])){
            setCookiesWithSession();
        }
        
    }
    else{
        //login non riuscito
        //$templateParams["errorelogin"] = "Errore! Controllare username o password!";
    }
}

if(isUserLoggedIn($dbh)){
    $templateParams["titolo"] = "Home";
    $templateParams["nome"] = "home.php";
    $templateParams["post"] = $dbh->getFullPosts(6);
}
else{
    $templateParams["titolo"] = "Login";
    $templateParams["nome"] = "login.php";
    $templateParams["js"] = array("js/sha512.js", "js/forms.js");
}
require 'template/base.php';
?>
