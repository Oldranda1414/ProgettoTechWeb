<?php
require_once 'bootstrap.php';

if(isUserLoggedIn()){
    $templateParams["titolo"] = "Home";
    $templateParams["nome"] = "home.php";
    $templateParams["post"] = $dbh->getFullPosts(6);
    require 'template/base.php';
}
else{
    require 'login.php';
}

?>