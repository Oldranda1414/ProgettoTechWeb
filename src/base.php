<?php
    $templateParams["notifications"] = $dbh->getNotifications($_SESSION['username']);
    $templateParams["user"] = $dbh->getUserInfo($_SESSION['username'])[0];
?>