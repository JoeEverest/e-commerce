<?php
$getOrders = mysqli_query($connect, "SELECT * FROM `orders` JOIN products WHERE orders.product_id = products.id AND orders.user = '$username' AND orders.open = 'true'");

$numRows = mysqli_num_rows($getOrders);
if ($numRows > 0) {
?>
    <span class="badge rounded-pill bg-danger">
        <?php echo $numRows; ?>
    </span>
<?php } ?>