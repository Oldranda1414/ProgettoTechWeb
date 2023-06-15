<?php
require_once 'bootstrap.php';
require "base.php";

if (isUserLoggedIn($dbh)) {
    $templateParams["titolo"] = "Home";
    $templateParams["nome"] = "home.php";
    array_push($templateParams["js"], "https://unpkg.com/axios/dist/axios.min.js", "js/posts.js");
    require 'template/base.php';
} else {
    require 'login.php';
}
?>