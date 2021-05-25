<?php
session_start();
require("./config/config.php");
require("./config/session.php");
if(isset($_GET['name'])){
$user = $_GET['name'];
}else{
    header("Location: index.php");
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
        .post img {
            max-width: 100%;
        }
        .post .details{
            padding: 5px;
        }
    </style>
    <title> </title>
</head>

<body>
    <?php if ($isLoggedIn) { ?>
        <a href="./logout.php">Logout</a>
    <?php } else { ?>
        <a href="./login.php">Login</a>
    <?php } ?>

    <div class="main">
        <?php
        $getProducts = mysqli_query($connect, "SELECT * FROM `products` WHERE user = '$user' ORDER BY id");
        while ($data = mysqli_fetch_array($getProducts)) {
            $images = json_decode($data['images'], true);
            $user = $data['user'];
            $name = $data['name'];
            $price = $data['price'];
            $id = $data['id'];
            $description = $data['description'];
        ?>
            <div class="post">
                <img src="<?php echo $images[0]; ?>" alt="">
                <div class="details">
                    <h3><?php echo $name; ?></h3>
                    <h3><?php echo $price; ?></h3>
                    <span><a href="profile.php?name=<?php echo $user; ?>"><?php echo $user; ?></a></span>
                    <span><a class="btn btn-sm btn-success" href="product.php?id=<?php echo $id; ?>">Order</a></span>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>