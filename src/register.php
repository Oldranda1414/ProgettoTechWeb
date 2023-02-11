<?php

    require_once 'bootstrap.php';
    //TODO actually get the values from the form and register the user
    //getting the password from the register form
    $password = "";
    $email = "";
    $username = "";

    $dbh->registerUser($username, $email, $password);

    header('Location: ./');

?>