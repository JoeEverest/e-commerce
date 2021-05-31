<?php
session_start();
require("./config/config.php");
require("./config/session.php");
if (isset($_GET['name'])) {
    $user = $_GET['name'];
} else {
    header("Location: index.php");
}

$getProfileData = mysqli_query($connect, "SELECT * FROM `auth` WHERE username = '$user'");
$profileData = mysqli_fetch_array($getProfileData);
$profileName = $profileData['username'];
$phone = $profileData['phone'];
$email = $profileData['email'];
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
    <title>Profile: @<?php echo $profileName; ?></title>
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
    <div class="top">
        <div class="card">
            <h5>Username: @<?php echo $profileName; ?></h5>
            <h5>Phone Number: <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></h5>
            <p>Email Address: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
        </div>
    </div>
    <div class="main">
        <?php
        $getProducts = mysqli_query($connect, "SELECT * FROM `products` WHERE user = '$user' ORDER BY id DESC");
        while ($data = mysqli_fetch_array($getProducts)) {
            $images = json_decode($data['images'], true);
            $user = $data['user'];
            $name = $data['name'];
            $price = $data['price'];
            $id = $data['id'];
            $description = $data['description'];
        ?>
            <div class="post card">
                <h4><?php echo $name; ?></h4>
                <a href="order.php?id=<?php echo $id; ?>">
                    <div class="img" style="background-image: url('<?php echo $images[0]; ?>');"></div>
                </a>
                <div class="details">
                    <h5>
                        <span><?php echo number_format($price, 2); ?>/=</span>
                        <span><a class="btn btn-sm btn-success" href="order.php?id=<?php echo $id; ?>">Order</a></span>
                    </h5>
                </div>
            </div>
        <?php } ?>
    </div>
        <?php require("./components/bottom_bar.php"); ?>

</body>

</html>