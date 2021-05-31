<?php
require("./config/config.php");
if (isset($_GET['id'])) {
    $orderID = $_GET['id'];
    $cancelOrder = "UPDATE `orders` SET `status` = 'cancelled' WHERE `orders`.`id` = '$orderID'";
    if (mysqli_query($connect, $cancelOrder)) {
        header("Location: my_orders.php");
    }
}else{
    header("Location: my_orders.php");
}
?>