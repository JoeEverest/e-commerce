<?php
require('../config/config.php');
require('session.php');
require('account-handlers/verification_check_handler.php');
require("queries.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>Create Product</h4>
    <form method="post">
        <input type="text" name="product_name" placeholder="Product Name">
        <select name="product_category">
            <option value="">--- SELECT PRODUCT CATEGORY ----</option>
            <?php
            while($categoryData = mysqli_fetch_array($getCategoryDataQuery)){
                $categoryID = $categoryData['category_id'];
                $categoryName = $categoryData['category_name'];
            ?>
            <option value="<?php echo $categoryID; ?>"><?php echo $categoryName; ?></option>
            <?php
            }
            ?>
        </select>
        <input type="number" name="price" placeholder="Product Price">
        <Span>Product Images</Span>
        <input type="file" name="image1">
        <input type="file" name="image2">
        <input type="file" name="image3">
        <textarea name="description" cols="30" rows="10" placeholder="Product Description"></textarea>
        <button type="submit" name="add_product">Add Product</button>
    </form>
</body>
</html>