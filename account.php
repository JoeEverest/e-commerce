<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="minimal-ui, width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/nav.css">
    <title>Settings</title>
</head>

<body>
    <?php require("./components/nav.php"); ?>

    <div class="container">
        <h3>Settings</h3>
        <ul>
            <?php
            session_start();
            require("./config/config.php");
            require("./config/session.php");
            if ($isLoggedIn) { ?>
                <li><a href="./sell/">Sell</a>
                    <?php require("./notifications.php"); ?>
                </li>
                <li><a href="./logout.php">Logout</a></li>
            <?php } else { ?>
                <li><a href="./register.php">Sign Up</a></li>
                <li><a href="./login.php">Login</a></li>
            <?php } ?>

        </ul>
        <?php require("./components/bottom_bar.php"); ?>
    </div>

    <script>
        function setActive(i) {
            document.getElementById(i).classList.add("active");
        }
        document.addEventListener("DOMContentLoaded", function() {
            setActive("account");
        });
    </script>
</body>

</html>