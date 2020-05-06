<?php
require('../config/config.php');
require('session.php');
require('account-handlers/verification_check_handler.php');
require("queries.php");
$errors = array();
$message = array();
require("product_handlers/create_category_handler.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <input type="text" name="category_name" placeholder="Category Name">
        <button type="submit" name="add_category">Create Category</button>
    </form>

    <h4>Categories</h4>
    <table>
        <thead>
            <th>S/N</th>
            <th>Category Name</th>
        </thead>
        <tbody>
            <?php
            while ($data = mysqli_fetch_array($getCategoryDataQuery)) {
                $id = $data['id'];
                $category_name = $data['category_name'];

            ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $category_name; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>