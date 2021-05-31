<?php
require("../config/config.php");
require("../config/session.php");
$errors = array();
$message = array();

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    $getProductDetails = mysqli_query($connect, "SELECT * FROM `products` WHERE id = '$productId' AND user = '$username'");
    $productData = mysqli_fetch_array($getProductDetails);

    $productName = $productData['name'];
    $productPrice = $productData['price'];
    $productCategory = $productData['category'];
    $productState = $productData['used'];
    if ($productState == 'true') {
        $productState = array();
        $productState['title'] = 'Used';
        $productState['bool'] = 'true';
    } else {
        $productState = array();

        $productState['title'] = 'New';
        $productState['bool'] = 'false';
    }

    $productDescription = $productData['description'];
} else {
    header("Location: index.php");
}

if (isset($_POST['edit'])) {
    if (isset($_POST['name'], $_POST['price'], $_POST['category'], $_POST['condition'], $_POST['description'])) {
        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $condition = mysqli_real_escape_string($connect, $_POST['condition']);
        $category = mysqli_real_escape_string($connect, $_POST['category']);
        $price = mysqli_real_escape_string($connect, $_POST['price']);
        $description = mysqli_real_escape_string($connect, $_POST['description']);

        $editProduct = "UPDATE `products` SET 
                        `name` = '$name',
                        `price` = '$price',
                        `used` = '$condition',
                        `category` = '$category',
                        `description` = '$description' 
                        WHERE `products`.`id` = '$productId'";
        if (mysqli_query($connect, $editProduct)) {
            array_push($message, "Product details updated Successfully");
            header("Location: ../order.php?id=" . $productId);
        } else {
            echo mysqli_error($connect);
        }
    }
}
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
    <script src="https://kit.fontawesome.com/f66031190f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/nav.css">
    <style>
        .container {
            margin-bottom: 70px;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
    <title>Post Product</title>
</head>

<body>
<?php require("../components/nav.php"); ?>

    <div class="container">
        <h3>Add Product</h3>
        <?php
        if (!empty($errors)) {
            foreach ($errors as $key => $value) {
        ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo $value; ?>
                </div>
            <?php
            }
        }

        if (!empty($message)) {
            foreach ($message as $key => $value) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php
                    echo $value;
                    ?>
                </div>
        <?php }
        } ?>
        <form method="post">
            <div class="form-group">
                <input placeholder="Product Name" value="<?php echo $productName; ?>" required type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <input placeholder="Product Price" value="<?php echo $productPrice; ?>" required type="number" name="price" class="form-control">
            </div>
            <div class="form-group">
                <select required name="category" class="form-control">
                    <option value="<?php echo $productCategory; ?>"><?php echo $productCategory; ?></option>
                    <option value="">Select Category</option>
                    <option value="other">Other</option>
                    <option value="accessories">Accessories</option>
                    <option value="electronics">Electronics</option>
                    <option value="clothing">Clothing</option>
                    <option value="shoes">Shoes</option>
                </select>
            </div>
            <div class="form-group">
                <select name="condition" class="form-control">
                    <option value="<?php echo $productState['bool']; ?>"><?php echo $productState['title']; ?></option>
                    <option value="">Product Select Condition</option>
                    <option value="true">Used</option>
                    <option value="false">New</option>
                </select>
            </div>
            <div class="form-group">
                <textarea placeholder="Product Description" ea name="description" class="form-control" cols="30" rows="10"><?php echo $productDescription; ?></textarea>
            </div>
            <button type="submit" name="edit" class="form-control btn btn-outline-info"><i class="fa fa-pen"></i> Edit Product</button>
        </form>
    </div>
        <?php require("./bottom_bar.php"); ?>

</body>

</html>