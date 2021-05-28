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
    <meta name="viewport" content="minimal-ui, width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <style>
        .container {
            height: 100vh;
            display: grid;
            place-items: center;
        }
    </style>
    <title>Create an Account: </title>
</head>

<body>
    <div class="container">
        <h3>Register</h3>
        <?php
        if (!empty($errors)) {
            foreach ($errors as $key => $value) {
        ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php
                    echo $value;
                    ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <?php
            }
        }
        ?>
        <form method="post">
            <div class="form-group">
                <lable>Username</lable>
                <input class="form-control" required type="text" name="username" placeholder="@username">
            </div>
            <div class="form-group">
                <lable>Email Address</lable>
                <input class="form-control" required type="email" name="email" placeholder="somebody@domain.com">
            </div>
            <div class="form-group">
                <lable>Phone Number</lable>
                <input class="form-control" required type="tel" name="phone" placeholder="0789456123">
            </div>
            <div class="form-group">
                <lable>Password</lable>
                <input class="form-control" required type="password" placeholder="Password" name="password1">
            </div>
            <div class="form-group">
                <lable>Confirm Password</lable>
                <input class="form-control" required type="password" placeholder="Confirm Password" name="password2">
            </div>
            <div class="form-group">
                <lable>Institution/University</lable>
                <select class="form-control" name="uni" required>
                    <option value="">--- Select Institute / University Name ---</option>
                    <option value="iaa">Institute of Accountancy Arusha</option>
                </select>
            </div><br>
            <button class="form-control btn btn-primary" type="submit" name="register">Register</button>
            <p>Already have an account? <a href="./login.php">Login Here</a></p>
        </form>
    </div>
</body>

</html>