<?php
include("config/config.php");
$error = array();
if (isset($_POST['register'])) {
    if (!$_POST['firstName'] | !$_POST['middleName'] | !$_POST['lastName'] | !$_POST['email'] | !$_POST['password1'] | !$_POST['password2']) {
        array_push($error, "All input Fields are Required");
    } else {
        $firstname = urlencode($_POST['firstName']);
        $middlename = urlencode($_POST['middleName']);
        $lastname = urlencode($_POST['lastName']);

        if (!preg_match("/^[a-zA-Z ]*$/", $firstname) | !preg_match("/^[a-zA-Z ]*$/", $middlename) | !preg_match("/^[a-zA-Z ]*$/", $lastname)) {
            array_push($error, "Only letters and white space allowed");
        } else {
            $fullName = $firstname . ' ' . $middlename . ' ' . $lastname;

            $email = $_POST['email'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($error, "Invalid email format");
            } else {
                $query = "SELECT * FROM users WHERE email = '$email'";
                $query = mysqli_query($connect, $query);

                $number = mysqli_num_rows($query);
                if ($number > 0) {
                    array_push($error, "The user with the email '$email' already exists, <a href='login.php'>log in</a> instead?");
                } else {
                    $password1 = $_POST['password1'];
                    $password2 = $_POST['password2'];

                    if ($password1 != $password2) {
                        array_push($error, "Passwords don't match");
                    } else {
                        if (strlen($password1) < 8) {
                            array_push($error, "Password should be at least 8 characters long");
                        } else {
                            $password = sha1(md5($password1));

                            $query = "INSERT INTO users VALUES ('', '$fullName', '$email', '$password')";
                            $query = mysqli_query($connect, $query);

                            session_start();
                            $_SESSION['email'] = $email;
                            header("Location: login.php");
                            exit();
                        }
                    }
                }
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <?php
    if ($error) {
        echo '<div class="error"><ul>';
        foreach ($error as $value) {
            echo "<li>" . $value . "</li>";
        }
        echo '</ul></div>';
    }
    ?>
    <form method="post">
        <input type="text" name="firstName" placeholder="First Name">
        <input type="text" name="middleName" placeholder="Middle Name">
        <input type="text" name="lastName" placeholder="Last Name">
        <input type="email" name="email" placeholder="Email Adress">
        <input type="password" name="password1" placeholder="Password">
        <input type="password" name="password2" placeholder="Confirm Password">
        <button type="submit" name="register">Register</button>
    </form>
</body>

</html>