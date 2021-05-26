<?php
session_start();
require("../config/config.php");
require("../config/session.php");
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
    <title>Orders</title>
</head>

<body>
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="orders.php">Open Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="closed_orders.php">Closed Orders</a>
            </li>
        </ul>
        <table class="table table-striped table-sm">
            <thead class="thead-dark">
                <th>Product Name</th>
                <th>Price</th>
                <th>Order By</th>
                <th>Date</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php
                $getOrders = mysqli_query($connect, "SELECT orders.id, products.name, products.price, orders.order_by, orders.user, orders.date FROM `orders` JOIN products WHERE orders.product_id = products.id AND orders.user = '$username' AND orders.open = 'false' ORDER BY orders.id ASC");
                while ($data = mysqli_fetch_array($getOrders)) {
                    $name = $data['name'];
                    $id = $data['id'];
                    $price = $data['price'];
                    $order_by = $data['order_by'];
                    $date = $data['date'];
                ?>
                    <tr>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $order_by; ?></td>
                        <td><?php echo $date; ?></td>
                        <td><a class="btn btn-sm btn-danger" disabled>Closed</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php require("./bottom_bar.php"); ?>
</body>

</html>