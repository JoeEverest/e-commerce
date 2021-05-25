<?php
if (isset($_POST['login'])) {
    if (isset($_POST['email'], $_POST['password'])) {
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $password = sha1(md5(json_encode($_POST['password'] . $email)));

        $getUsers = mysqli_query($connect, "SELECT * FROM auth WHERE email = '$email'");
        $numRows = mysqli_num_rows($getUsers);
        if ($numRows > 0) {

            $data = mysqli_fetch_array($getUsers);
            $dbPassword = $data['password'];
            $user = $data['username'];

            if ($password == $dbPassword) {
                //redirect options
                $_SESSION['user'] = $user;
                setcookie("user", $user, time() + (86400 * 30), "/");
                header("Location: index.php");
            } else {
                array_push($errors, "Email or Password incorrect, try again 🤦‍♂️");
            }
        }else {
            array_push($errors, "User doesn't exist, register instead");
        }
    } else {
        array_push($errors, "All fields are required");
    }
}
?>