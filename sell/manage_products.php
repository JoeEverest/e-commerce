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
    <link rel="stylesheet" href="../assets/css/nav.css">
    <title>Orders</title>
</head>

<body>
    <nav>
        <div class="brand">
            <h3>NIUZIE</h3>
        </div>
    </nav>
    <div class="container">
    <h3>Manage Products</h3>
        <table class="table table-striped table-sm">
            <thead class="thead-dark">
                <th>Product Name</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                <?php
                $getOrders = mysqli_query($connect, "SELECT * FROM products WHERE user = '$username' ORDER BY id ASC");
                while ($data = mysqli_fetch_array($getOrders)) {
                    $name = $data['name'];
                    $id = $data['id'];
                    $price = $data['price'];
                ?>
                    <tr>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><a href="edit_product.php?id=<?php echo $id; ?>" class="btn btn-sm btn-info">Edit</a></td>
                        <td><a href="delete_product.php?id=<?php echo $id; ?>" class="btn btn-sm btn-danger">Delete</a></td>
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