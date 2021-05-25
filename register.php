<?php
session_start();
require("./config/config.php");
$errors = array();
$messages = array();
require("./handlers/registration_handler.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Account:  </title>
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
            <lable>Username</lable>
            <input required type="text" name="username" placeholder="@username">
        </div>
        <div class="form-group">
            <lable>Email Address</lable>
            <input required type="email" name="email" placeholder="somebody@domain.com">
        </div>
        <div class="form-group">
            <lable>Phone Number</lable>
            <input required type="tel" name="phone" placeholder="0789456123">
        </div>
        <div class="form-group">
            <lable>Password</lable>
            <input required type="password" placeholder="Password" name="password1">
        </div>
        <div class="form-group">
            <lable>Confirm Password</lable>
            <input required type="password" placeholder="Confirm Password" name="password2">
        </div>
        <div class="form-group">
            <lable>Institution/University</lable>
            <select name="uni" required>
                <option value="">--- Select Institute / University Name ---</option>
                <option value="iaa">Institute of Accountancy Arusha</option>
            </select>
        </div>
        <button type="submit" name="register">Register</button>
    </form>
</body>

</html>