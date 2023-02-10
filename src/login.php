<?php
require_once 'bootstrap.php';

if(isset($_POST["username"]) && isset($_POST["password"])){
    
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare username o password!";
    }
    else{
        registerLoggedUser($login_result[0]);
        
        if(isset($_POST["rememberMeCheckbox"])){
            $daysToExpire = 1;
            setcookie("Username", $login_result[0]["Username"], time() + (86400 * $daysToExpire), "/");
            setcookie("User_id", $login_result[0]["User_id"], time() + (86400 * $daysToExpire), "/");
        }
    }

    
}
//TODO check if user is logged in and load the home page accordigly

if(isUserLoggedIn()){
    $templateParams["titolo"] = "Home";
    $templateParams["nome"] = "home.php";
    $templateParams["post"] = $dbh->getFullPosts(3);
}
else{
    $templateParams["titolo"] = "Login";
    $templateParams["nome"] = "login.php";
}
require 'template/base.php';
?>
