<?php
    $templateParams["user"] = $dbh->getUserInfo($_SESSION['username'])[0];

    var_dump($_POST);
?>