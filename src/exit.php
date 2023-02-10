<?php
    require_once 'bootstrap.php';

    logoutUser();
    header('Location:login.php');
?>