<?php
require('../config/config.php');
require('session.php');
require('account-handlers/verification_check_handler.php');
require("queries.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h4>Account</h4>
    <ul>
        <li><a href="change_password.php">Change Password</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <h4>Products</h4>
    <ul>
        <li><a href="create_category.php">Create New Category</a></li>
        <li><a href="create_product.php">Create New Product</a></li>
    </ul>
</body>

</html>