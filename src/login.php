<?php
require_once 'bootstrap.php';

if(isset($_POST["username"]) && isset($_POST["p"])){
    if($dbh->secureLoginUser($_POST["username"], $_POST["p"])){
        //Login riuscito
        if(isset($_POST["rememberMeCheckbox"])){
            setCookiesWithSession();
        }
    }
    else{
        echo('<p class="text-center text-danger login-error-label mx-2"><u><img src="./upload/icons/alert.png" class="alert-icon img-fluid me-2" alt="alert icon">Password non corretta, riprovare.</u></p>');

        //login non riuscito
        //$templateParams["errorelogin"] = "Errore! Controllare username o password!";
    }
}

if(isUserLoggedIn($dbh)){
    require 'home.php';
}
else{
    $templateParams["titolo"] = "Login";
    $templateParams["nome"] = "login.php";
    $templateParams["js"] = array("js/sha512.js", "js/forms.js", "js/login.js");
    require 'template/base.php';
}

?>
