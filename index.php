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
    <script src="https://kit.fontawesome.com/f66031190f.js" crossorigin="anonymous"></script>
    <title> </title>
</head>

<body>
    <?php if ($isLoggedIn) { ?>
        <span class="sell"><a href="/sell/"><i class="fas fa-cash-register"></i></a></span>
    <?php } ?>
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
            <div class="post card">
                <img src="<?php echo $images[0]; ?>" alt="" loading="lazy">
                <div class="details">
                    <h5>
                        <span><?php echo $name; ?></span>
                        <span><?php echo number_format($price, 2); ?>/=</span>
                    </h5>
                    <span><a class="btn btn-sm btn-success" href="order.php?id=<?php echo $id; ?>">Order</a></span>
                </div>
            </div>
        <?php } ?>
    </div>
    <script>
        function setActive(i) {
            document.getElementById(i).classList.add("active");
        }
        document.addEventListener("DOMContentLoaded", function() {
            setActive("home");
        });
    </script>
    <?php require("./bottom_bar.php"); ?>
</body>

</html>