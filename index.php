<?php
include('config/config.php');
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="logout.php">Logout</a>

    <?php
    $getStatus = mysqli_query($connect, "SELECT * FROM users WHERE email = '$user'");
    
    ?>
</body>

</html>