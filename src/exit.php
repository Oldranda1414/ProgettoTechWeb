<?php
    require_once 'bootstrap.php';

    logoutUser();
    $templateParams["titolo"] = "Login";
    $templateParams["nome"] = "login.php";
    header('Location:login.php');
?>