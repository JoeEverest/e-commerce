<?php
session_start();
require("../config/config.php");
require("../config/session.php");
$errors = array();
$message = array();
if (!$isLoggedIn) {
    header("Location: ../login.php");
}
function compressImage($source, $destination, $quality)
{

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

    if(imagejpeg($image, $destination, $quality)){
        return true;
    }else {
        return false;
    }
}
if (isset($_POST['add'])) {
    if (isset($_POST['name'], $_POST['price'], $_POST['category'], $_POST['condition'], $_POST['description'])) {
        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $condition = mysqli_real_escape_string($connect, $_POST['condition']);
        $category = mysqli_real_escape_string($connect, $_POST['category']);
        $price = mysqli_real_escape_string($connect, $_POST['price']);
        $description = mysqli_real_escape_string($connect, $_POST['description']);
        $date = date("Y-m-d");
        $id = uniqid("P.", true);

        $uploadSuccess = true;
        $images = array();

        if (!empty($_FILES['images']['name'])) {
            $directory = "../images/";

            for ($i = 0; $i < count($_FILES['images']['name']); $i++) {

                $targetFile = $directory . uniqid("IMG_") . basename($_FILES['images']['name'][$i]);
                $check = getimagesize($_FILES["images"]["tmp_name"][$i]);

                if ($check == false) {
                    array_push($errors, "File is not an image");
                } else {
                    if (compressImage($_FILES["images"]["tmp_name"][$i], $targetFile, 20)) {
                        array_push($images, $targetFile);
                    } else {
                        $uploadSuccess = false;
                    }
                }
            }
            $images = json_encode($images);
            if ($uploadSuccess) {
                $addProduct = "INSERT INTO products VALUES ('$id', '$name', '$price', '$condition', '$category', '$description', '$images', '$date', '$username', 'true')";
                if (mysqli_query($connect, $addProduct)) {
                    array_push($message, "Product Added Successfully");
                } else {
                    echo mysqli_error($connect);
                }
            }
        } else {
            array_push($errors, "Product Image(s) Missing");
        }
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
    <nav>
        <div class="brand">
            <h3>NIUZIE</h3>
        </div>
    </nav>
    <div class="container">
        <h3>Add Product</h3>
        <?php
        if (!empty($errors)) {
            foreach ($errors as $key => $value) {
        ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php
                    echo $value;
                    ?>
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
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input placeholder="Product Name" required type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <input placeholder="Product Price" required type="number" name="price" class="form-control">
            </div>
            <div class="form-group">
                <select required name="category" class="form-control">
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
                    <option value="">Product Select Condition</option>
                    <option value="true">Used</option>
                    <option value="false">New</option>
                </select>
            </div>
            <div class="form-group">
                <textarea placeholder="Product Description" ea name="description" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <input required type="file" name="images[]" multiple accept=".jpg, .png, .jpeg" class="form-control">
            </div>
            <button type="submit" name="add" class="form-control btn btn-outline-success"><i class="fa fa-cart-plus"></i> Add Product</button>
        </form>
    </div>
    <?php require("./bottom_bar.php"); ?>
</body>

</html>