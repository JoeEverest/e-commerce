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
    <meta name="viewport" content="minimal-ui, width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/nav.css">
    <script src="https://kit.fontawesome.com/f66031190f.js" crossorigin="anonymous"></script>
    <title>NIUZIE</title>
</head>

<body>
    <?php require("./components/nav.php"); ?>
    <div class="main">
        <?php
        $getProducts = mysqli_query($connect, "SELECT * FROM `products` ORDER BY id DESC");
        while ($data = mysqli_fetch_array($getProducts)) {
            $images = json_decode($data['images'], true);
            $user = $data['user'];
            $name = $data['name'];
            $price = $data['price'];
            $id = $data['id'];
            $description = $data['description'];
        ?>
            <div class="post">
                <div class="post-image" style="background-image: url('<?php echo $images[0]; ?>');">
                    <a href="order.php?id=<?php echo $id; ?>">
                        <span class="img"></span>
                    </a>
                </div>
                <div class="details">
                    <h4><?php echo $name; ?></h4>
                    <p><?php echo substr($description, 0, 50) . "..."; ?></p>
                    <div class="price">
                        <h5>Price: <?php echo number_format($price, 2); ?>/=</h5>
                        <span><a class="button" href="order.php?id=<?php echo $id; ?>">More</a></span>
                    </div class="price">
                </div>
            </div>
        <?php } ?>
        <script>
            function setActive(i) {
                document.getElementById(i).classList.add("active");
            }
            document.addEventListener("DOMContentLoaded", function() {
                setActive("home");
            });
        </script>
        <?php require("./components/bottom_bar.php"); ?>
    </div>
</body>

</html>