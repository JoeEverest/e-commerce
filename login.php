<?php
include("config/config.php");
session_start();
$errors = array();

if (isset($_POST['login'])) {
    if (!$_POST['email'] | !$_POST['password']) {
        array_push($errors, "All input fields are required");
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = sha1(md5($password));

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Invalid email format");
        } else {
            $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $query = mysqli_query($connect, $query);
            $num = mysqli_num_rows($query);

            if ($num == 1) {
                $_SESSION['email'] = $email;
                header("Location: index.php");
            } else {
                array_push($errors, "Email or password incorrect");
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
    <title>Document</title>
</head>

<body>
    <div class="errors">
        <?php
        if ($errors) {
            echo '<div class="error"><ul>';
            foreach ($errors as $value) {
                echo "<li>" . $value . "</li>";
            }
            echo '</ul></div>';
        }
        ?>
    </div>
    <form method="post">
        <input type="email" name="email" placeholder="Email Address">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="login">Log In</button>
    </form>
</body>

</html>