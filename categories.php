<?php
session_start();
require("./config/config.php");
require("./config/session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/nav.css">
    <script src="https://kit.fontawesome.com/f66031190f.js" crossorigin="anonymous"></script>
    <title>Categories</title>
</head>

<body>
    <?php require("./components/nav.php"); ?>
    <div class="main">
        <h3>Categories coming next update</h3>

        <script>
            function setActive(i) {
                document.getElementById(i).classList.add("active");
            }
            document.addEventListener("DOMContentLoaded", function() {
                setActive("categories");
            });
        </script>
        <?php require("./components/bottom_bar.php"); ?>
    </div>

</body>

</html>