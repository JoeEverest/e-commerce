<?php
if (isset($_POST['add_category'])) {
    if (!$_POST['category_name']) {
        array_push($errors, "Category Name Required");
    } else {
        $categoryName = $_POST['category_name'];

        $getNumRows = mysqli_num_rows($getCategoryDataQuery);

        $nextNum = $getNumRows + 1;

        $categoryID = "C-" . $nextNum;

        $addCategoryQuery = "INSERT INTO category VALUES ('', '$categoryName', '$categoryID')";

        if (mysqli_query($connect, $addCategoryQuery)) {
            array_push($message, "Category Created Successfully");
            header("Refresh: 0");
        }
    }
}
?>