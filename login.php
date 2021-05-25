<?php
session_start();
require("./config/config.php");
$errors = array();
$messages = array();
require("./handlers/login_handler.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in:  </title>
</head>

<body>
    <?php
    if (!empty($errors)) {
        foreach ($errors as $key => $value) {
    ?>
            <span>
                <?php
                echo $value;
                ?>
            </span>
    <?php
        }
    }
    ?>
    <form method="post">
        <div class="form-group">
            <lable>Email Address</lable>
            <input required type="email" name="email" placeholder="somebody@domain.com">
        </div>
        <div class="form-group">
            <lable>Password</lable>
            <input required type="password" placeholder="Password" name="password">
        </div>
        <button type="submit" name="login">Login</button>
        <a href="./register.php">Register?</a>
    </form>
</body>

</html>