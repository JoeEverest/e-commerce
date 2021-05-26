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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <title>Sell</title>
</head>

<body>
    <div class="container">
        <?php if ($isLoggedIn) { ?>
            <a href="./logout.php">Logout</a>
        <?php } else { ?>
            <a href="./login.php">Login</a>
        <?php } ?>
        <ul>
            <li><a href="add_product.php">Post Product</a></li>
            <li><a href="orders.php">My Orders</a></li>
        </ul>
    </div>
    <?php require("./bottom_bar.php"); ?>
</body>

</html>