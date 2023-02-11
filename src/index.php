<?php
require_once 'bootstrap.php';

if(isUserLoggedIn($dbh)){
    $templateParams["titolo"] = "Home";
    $templateParams["nome"] = "home.php";
    $templateParams["post"] = $dbh->getFullPosts(8);
    require 'template/base.php';
}
else{
    require 'login.php';
}

?>