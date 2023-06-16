<?php

require_once 'bootstrap.php';
require "base.php";
//getting the password from the register form
if (isset($_POST["username"]) && isset($_POST["p"]) && isset($_POST["email"])) {
    $errorCode = $dbh->registerUser($_POST["username"], $_POST["email"],  $_POST["p"]);
    if ($errorCode != 0) {
        if ($errorCode == 1062) {              //1062 is the error message for a duplicate entry. this shows that a duplicate username has been inserted
            $templateParams["registerError"] = "Lo Username " . $_POST["username"] . " è già utilizzato. Inserire un altro Username";
        } else {
            $templateParams["registerError"] = "E' avvenuto un errore. Codice errore: " . $errorCode;
        }
    }
    else{
        $templateParams["successWords"] = "Registrazione avvenuta con successo! Ora puoi accedere con le tue credenziali";
        list($result, $errorMsg) = $dbh->secureLoginUser($_POST["username"], $_POST["p"]);
        header('Location: ./');
    }
    $templateParams["titolo"] = "Register";
    $templateParams["nome"] = "register.php";
    array_push($templateParams["js"], "js/sha512.js", "js/forms.js", "js/register.js");
} else {
    $templateParams["titolo"] = "Register";
    $templateParams["nome"] = "register.php";
    array_push($templateParams["js"], "js/sha512.js", "js/register.js");
}
require 'template/base.php';
?>