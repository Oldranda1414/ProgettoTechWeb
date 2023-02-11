<?php
function isActive($pagename)
{
    if (basename($_SERVER['PHP_SELF']) == $pagename) {
        echo " class='active' ";
    }
}

function getIdFromName($name)
{
    return preg_replace("/[^a-z]/", '', strtolower($name));
}

function uploadImage($path, $image)
{
    $imageName = basename($image["name"]);
    $fullPath = $path . $imageName;

    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if ($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
    if (!in_array($imageFileType, $acceptedExtensions)) {
        $msg .= "Accettate solo le seguenti estensioni: " . implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do {
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME) . "_$i." . $imageFileType;
        } while (file_exists($path . $imageName));
        $fullPath = $path . $imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if (strlen($msg) == 0) {
        if (!move_uploaded_file($image["tmp_name"], $fullPath)) {
            $msg .= "Errore nel caricamento dell'immagine.";
        } else {
            $result = 1;
            $msg = $imageName;
        }
    }
    return array($result, $msg);
}

//TODO delete this function and implement it elsewere. Ugly use of $dbh
//checks if the user is logged in, through session or cookies. returns true if yes, false otherwise
function isUserLoggedIn($dbh)
{
    if (isset($_SESSION['user_id']) && isset($_SESSION['login_string'])) {
        return $dbh->checkLogin($_SESSION['user_id'], $_SESSION['login_string']);
    } else if (isset($_COOKIE["user_id"]) && isset($_COOKIE["login_string"])) {
        if ($dbh->checkLogin($_COOKIE['user_id'], $_COOKIE['login_string'])) {
            setSessionWithCookies();
            return true;
        }
    } else {
        return false;
    }
}

//secure version of session_start
function sec_session_start()
{
    $session_name = "sec_session_id";
    $secure = false;
    $httponly = true;
    ini_set("session.use_only_cookies", 1);
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
    session_name($session_name);
    session_start();
    session_regenerate_id();
}

//saves in $_SESSION all important variables contained in $_COOKIES
function setSessionWithCookies()
{
    $_COOKIE["user_id"] = $_SESSION["user_id"];
    $_COOKIE["username"] = $_SESSION["username"];
    $_COOKIE["login_string"] = $_SESSION["login_string"];
}

//saves in $_COOKIES all important variables contained in $_SESSION
function setCookiesWithSession()
{
    setcookie("user_id", $_SESSION["user_id"], time() + COOKIE_LIFETIME, COOKIE_PATH);
    setcookie("username", $_SESSION["username"], time() + COOKIE_LIFETIME, COOKIE_PATH);
    setcookie("login_string", $_SESSION["login_string"], time() + COOKIE_LIFETIME, COOKIE_PATH);
}

//deletes all the cookies
function deleteCookies()
{
    $sessionParams = session_get_cookie_params();
    setcookie(session_name(), "", time() - 42000, $sessionParams["path"], $sessionParams["domain"], $sessionParams["secure"], $sessionParams["httponly"]);
    setcookie("user_id", "", time() - 42000, COOKIE_PATH);
    setcookie("username", "", time() - 42000, COOKIE_PATH);
    setcookie("login_string", "", time() - 42000, COOKIE_PATH);
}

//fully deletes the session data, logging out the user
function logout()
{
    $_SESSION = array();
    deleteCookies();
    session_destroy();
    header('Location: ./');
}
