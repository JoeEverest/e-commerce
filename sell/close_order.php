<?php
require("../config/config.php");
if (isset($_GET['id'])) {
    $orderId = $_GET['id'];

    $closeOrderQuery = "UPDATE `orders` SET `open` = 'false' WHERE `orders`.`id` = '$orderId'";
    if (mysqli_query($connect, $closeOrderQuery)) {
        header("Location: orders.php");
    }
} else {
    header("Location: index.php");
}
?>