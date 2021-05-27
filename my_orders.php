<?php
session_start();
require("./config/config.php");
require("./config/session.php");
$errors = array();
$message = array();
if (!$isLoggedIn) {
    header("Location: ../login.php");
}
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
    <title>Orders</title>
</head>

<body>
    <nav>
        <div class="brand">
            <h3>NIUZIE</h3>
        </div>
        <?php if ($isLoggedIn) { ?>
            <span class="sell"><a href="/sell/"><i class="fas fa-cart-plus"></i></a></span>
        <?php } ?>
    </nav>
    <div class="container">
        <table class="table table-striped table-sm">
            <thead class="thead-dark">
                <th>Product Name</th>
                <th>Price</th>
                <th>Order By</th>
                <th>Date</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                $getOrders = mysqli_query($connect, "SELECT orders.id, orders.product_id, orders.open, products.name, products.price, orders.order_by, orders.user, orders.date FROM `orders` JOIN products WHERE orders.product_id = products.id AND orders.order_by = '$username' ORDER BY orders.id ASC");
                while ($data = mysqli_fetch_array($getOrders)) {
                    $name = $data['name'];
                    $id = $data['id'];
                    $productId = $data['product_id'];
                    $price = $data['price'];
                    $seller = $data['user'];
                    $date = $data['date'];
                    $open = $data['open'];

                    if ($open == "true") {
                        $status = "Open";
                    } else {
                        $status = "Closed";
                    }

                ?>
                    <tr>
                        <td><a href="order.php?id=<?php echo $productId; ?>"><?php echo $name; ?></a></td>
                        <td><?php echo $price; ?></td>
                        <td><a href="../profile.php?name=<?php echo $seller; ?>"><?php echo $seller; ?></a></td>
                        <td><?php echo $date; ?></td>
                        <td><?php echo $status; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script>
        function setActive(i) {
            document.getElementById(i).classList.add("active");
        }
        document.addEventListener("DOMContentLoaded", function() {
            setActive("my_orders");
        });
    </script>
    <?php require("./bottom_bar.php"); ?>
</body>

</html>