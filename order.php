<?php
session_start();
require("./config/config.php");
require("./config/session.php");
$message = array();

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    $getProductData = mysqli_query($connect, "SELECT * FROM `products` WHERE id = '$productId'");
    $data = mysqli_fetch_array($getProductData);
    $name = $data['name'];
    $price = $data['price'];
    $description = $data['description'];
    $images = json_decode($data['images'], true);
    $productId = $data['id'];
    $user = $data['user'];
} else {
    header("Location: index.php");
}
if (!$isLoggedIn) {
    header("Location: login.php?id=" . $_GET['id']);
}

if (isset($_POST['order'])) {
    $id = uniqid(true);
    $date = date("Y-m-d");

    $placeOrder = "INSERT INTO orders VALUES ('$id', '$productId', '$username', '$user', '$date', 'true')";
    if (mysqli_query($connect, $placeOrder)) {
        array_push($message, "Order Placed Successfully");
    }
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
    <style>
        .images img {
            max-width: 100%;
        }

        .post .details {
            padding: 5px;
        }
    </style>
    <title></title>
</head>

<body>
    <div class="container">
        <h3><?php echo $name; ?></h3>
        <div class="images">
            <img src="<?php echo $images[0]; ?>" alt="">
        </div>
        <div class="bar">
            <span class="Price">Tsh <?php echo number_format($price, 2); ?>/=</span>
            <span class="user">
                <form method="post">
                    <button type="submit" name="order" class="btn btn-sm btn-success">Order</button>
                </form>
            </span>
        </div>
        <div class="description">
            <?php echo $description; ?>
        </div>
    </div>
</body>

</html>