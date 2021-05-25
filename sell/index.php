<?php
session_start();
require("../config/config.php");
require("../config/session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell</title>
</head>

<body>
    <?php if ($isLoggedIn) { ?>
        <a href="./logout.php">Logout</a>
    <?php } else { ?>
        <a href="./login.php">Login</a>
    <?php } ?>
    <ul>
        <li><a href="add_product.php">Post Product</a></li>
        <li><a href="">My Orders</a></li>
        <li><a href="">Manage Products</a></li>
    </ul>
</body>

</html>