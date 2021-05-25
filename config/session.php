<?php
$isLoggedIn = false;
if (isset($_COOKIE['user'])) {
    $_SESSION['user'] = $_COOKIE['user'];
}
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
    $isLoggedIn = true;
}
?>