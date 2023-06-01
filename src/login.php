<?php
require_once 'bootstrap.php';

if(isset($_POST["username"]) && isset($_POST["p"])){
	$error = $dbh->secureLoginUser($_POST["username"], $_POST["p"]);
    if($error == 0){
        //Login riuscito
        if(isset($_POST["rememberMeCheckbox"])){
            setCookiesWithSession();
        }
    }
    elseif ($error == 1){
        //echo("login non riuscito");
		$errorMessage = '<p class="text-center text-danger login-error-label mx-2"><u><img src="./upload/icons/alert.png" class="alert-icon img-fluid me-2" alt="alert icon">Password non corretta, riprovare.</u></p>';
        //login non riuscito
        //$templateParams["errorelogin"] = "Errore! Controllare username o password!";
    }
	elseif ($error == 2) {
		$errorMessage = '<p class="text-center text-danger login-error-label mx-2"><u><img src="./upload/icons/alert.png" class="alert-icon img-fluid me-2" alt="alert icon">Utente immesso inesistente, riprovare.</u></p>';
	}
	elseif ($error == 3) {
		$errorMessage = '<p class="text-center text-danger login-error-label mx-2 border border-danger rounded bg-4"><u><img src="./upload/icons/alert.png" class="alert-icon img-fluid me-2" alt="alert icon">L\'account è stato momentaneamente bloccato per eccesso di tentativi.</u></p>';
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
