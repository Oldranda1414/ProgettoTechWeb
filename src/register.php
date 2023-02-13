<?php

require_once 'bootstrap.php';
//TODO check if passwords are the same
//TODO check if values inserted by user are correct/usable
//getting the password from the register form
if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])) {
    $dbh->registerUser($_POST["username"], $_POST["email"],  $_POST["password"]);
    $templateParams["titolo"] = "Register";
    $templateParams["nome"] = "register.php";
    $templateParams["js"] = array("js/sha512.js", "js/forms.js");
    $templateParams["registrationResult"] = true;
} else {
    $templateParams["titolo"] = "Register";
    $templateParams["nome"] = "register.php";
    $templateParams["js"] = array("js/sha512.js", "js/forms.js");
}
require 'template/base.php';
