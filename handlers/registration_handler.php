<?php
if (isset($_POST['register'])) {
    if (isset($_POST['username'], $_POST['email'], $_POST['phone'], $_POST['password1'], $_POST['password2'], $_POST['uni'])) {
        $user = strtolower(mysqli_real_escape_string($connect, $_POST['username']));
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $phone = mysqli_real_escape_string($connect, $_POST['phone']);
        $password1 = sha1(md5(json_encode($_POST['password1'] . $email)));
        $password2 = sha1(md5(json_encode($_POST['password2'] . $email)));
        $uni = mysqli_real_escape_string($connect, $_POST['uni']);
        $date = date("Y-m-d");
        $id = uniqid(true);

        if ($password1 == $password2) {
            $getUsers = mysqli_query($connect, "SELECT * FROM auth WHERE username = '$user'");
            $numRows = mysqli_num_rows($getUsers);

            if ($numRows > 0) {
                array_push($errors, "Username already taken 😕");
            } else {

                $getEmail = mysqli_query($connect, "SELECT * FROM auth WHERE email = '$email'");
                $rows = mysqli_num_rows($getEmail);

                if ($rows > 0) {
                    array_push($errors, "Email Address already in use, Log In instead 🤷‍♀️");
                } else {

                    $registerQuery = "INSERT INTO auth VALUES ('$id', '$user', '$email', '$phone', '$password1', '$uni', '$date', 'FALSE')";

                    if (mysqli_query($connect, $registerQuery)) {
                        $_SESSION['user'] = $user;
                        setcookie("user", $user, time() + (86400 * 30), "/");
                        header("Location: index.php");
                    } else {
                        array_push($errors, "Something went wrong, try again 🙋🏾‍♂️");
                    }
                }
            }
        } else {
            array_push($errors, "Passwords don't match 🤦‍♂️");
        }
    } else {
        array_push($errors, "All fields are required");
    }
}
?>