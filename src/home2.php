<?php
require_once 'bootstrap.php';
require "base.php";

if(isUserLoggedIn($dbh)){
    $templateParams["titolo"] = "Home";
    $templateParams["nome"] = "home2.php";
    $templateParams["js"] = array("https://unpkg.com/axios/dist/axios.min.js","js/posts-home.js");
    require 'template/base.php';
}
else{
    require 'login.php';
}

?>