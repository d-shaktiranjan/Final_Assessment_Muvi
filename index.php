<?php

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) header("location: er.php");

$isError = false;
$reason = "";
include "utils/alert.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "utils/conn.php";
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM `employee` WHERE email='$email'";
    $res = mysqli_query($conn, $sql);
    $about = mysqli_fetch_assoc($res);
    if ($about == null) {
        $isError = true;
        $reason = "Signup first";
    } else {
        if (password_verify($password, $about["password"])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header("location: er.php");
        } else {
            $isError = true;
            $reason = "Password not matched";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>Login Here</title>
</head>

<body>
    <?php include_once "utils/navbar.php" ?>
    <div class="container">
        <h1>
            Login Here
        </h1>
        <hr>
        <form method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-check form-switch my-2">
                <input class="form-check-input" type="checkbox" role="switch" id="showPassword">
                <label class="form-check-label" for="showPassword" id="checkBoxLabel">Show Password</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="signup.php" type="button" class="btn btn-primary">Create new Account</a>
            <a href="forgotPassword.php" type="button" class="btn btn-danger">Forgot Password</a>
        </form>
        <?php
        if ($isError) showAlert(false, $reason, "")
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/login.js"></script>
</body>

</html>