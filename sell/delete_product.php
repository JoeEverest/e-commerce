<?php
require("../config/config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $deleteProduct_query = "DELETE FROM `products` WHERE `products`.`id` ='$id'";
    if (mysqli_query($connect, $deleteProduct_query)) {
        header("Location: manage_products.php");
    }
} else {
    header("Location: manage_products.php");
}
?>