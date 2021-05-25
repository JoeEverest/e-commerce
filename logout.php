<?php
session_start();
setcookie("user", '', time()-7000000, '/');
session_destroy();
header("Location: index.php");
?>