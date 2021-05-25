<?php
session_start();
require("../config/config.php");
require("../config/session.php");
$errors = array();
$message = array();
if (!$isLoggedIn) {
    header("Location: ../login.php");
}

if (isset($_POST['add'])) {
    if (isset($_POST['name'], $_POST['price'], $_POST['description'])) {
        $name = mysqli_real_escape_string($connect, $_POST['name']);
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
                    if (move_uploaded_file($_FILES["images"]["tmp_name"][$i], $targetFile)) {
                        array_push($images, $targetFile);
                    } else {
                        $uploadSuccess = false;
                    }
                }
            }
            $images = json_encode($images);
            if ($uploadSuccess) {
                $addProduct = "INSERT INTO products VALUES ('$id', '$name', '$price', '$description', '$images', '$date', '$username', 'true')";
                if (mysqli_query($connect, $addProduct)) {
                    array_push($message, "Product Added Successfully");
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
    <title>Post Product</title>
</head>

<body>
    <div class="container">
        <a href="../logout.php">Logout</a>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <lable>Product Name</lable>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <lable>Product Price</lable>
                <input type="number" name="price" class="form-control">
            </div>
            <div class="form-group">
                <lable>Product Description</lable>
                <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <lable>Product Images</lable>
                <input type="file" name="images[]" multiple accept=".jpg, .png, .jpeg" class="form-control">
            </div>
            <button type="submit" name="add" class="btn btn-outline-success">Add Product</button>
        </form>
    </div>
</body>

</html>