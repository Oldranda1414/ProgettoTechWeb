<?php
require_once 'bootstrap.php';
require "base.php";

if(isset($_POST["username"]) && isset($_POST["p"])){
	list($result, $errorMsg) = $dbh->secureLoginUser($_POST["username"], $_POST["p"]);
    if($result != 0){
        //Login riuscito
        if(isset($_POST["rememberMeCheckbox"])){
            setCookiesWithSession();
        }
    }
    else{
        if($errorMsg == "passwordWrong"){
            $templateParams["loginError"] = '<p class="text-center text-danger login-error-label mx-2"><u><img src="./upload/icons/alert.png" class="alert-icon img-fluid me-2" alt="alert icon">Password non corretta, riprovare.</u></p>';
        }
        else if($errorMsg == "userDoesNotExist"){
            $templateParams["loginError"] = '<p class="text-center text-danger login-error-label mx-2"><u><img src="./upload/icons/alert.png" class="alert-icon img-fluid me-2" alt="alert icon">Utente immesso inesistente, riprovare.</u></p>';
        }
        else if($errorMsg == "accountDisabled"){
            $templateParams["loginError"] = '<p class="text-center text-danger login-error-label mx-2 border border-danger rounded bg-4"><u><img src="./upload/icons/alert.png" class="alert-icon img-fluid me-2" alt="alert icon">L\'account è stato momentaneamente bloccato per eccesso di tentativi.</u></p>';
        }
    }
}

if(isUserLoggedIn($dbh)){
    require 'home.php';
}
else{
    $templateParams["titolo"] = "Login";
    $templateParams["nome"] = "login.php";
    array_push($templateParams["js"], "js/sha512.js", "js/forms.js", "js/login.js");
    require 'template/base.php';
}

?>
