<?php
require_once 'bootstrap.php';

if (isUserLoggedIn($dbh)) {
    require 'home.php';
} else {
    require 'login.php';
}
