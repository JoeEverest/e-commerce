<?php
session_start();
if (isset($_SESSION['email'])) {
    $user = $_SESSION['email'];
} else {
    header("Location: login.php");
}
?>
<style>
    input{
        display: block;
        margin: 10px;
    }
    * {
        font-family: Lato;
    }
</style>