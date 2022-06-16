<?php

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) header("location: er.php");

include "utils/alert.php";
$isUpdated = false;
$isError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    include "utils/conn.php";
    include "utils/password.php";
    include "utils/send.php";
    $password = generatePassword();
    $status = sendMail($email, "", $password);
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE `employee` SET `password` = '$hash' WHERE `employee`.`email` = '$email'";

    $res = mysqli_query($conn, $sql);
    if ($res) $isUpdated = true;
    else $isError = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>Forgot Password</title>
</head>

<body>
    <?php include_once "utils/navbar.php" ?>
    <div class="container">
        <h2>Reset Password</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
            </div>
            <button type="submit" class="btn btn-primary" id="resetBtn" disabled>Reset</button>
            <a href="index.php" type="button" class="btn btn-primary">Back to Login</a>
            <a href="signup.php" type="button" class="btn btn-primary">Create an account</a>
        </form>
        <?php
        if ($isError) showAlert(false, "Unable to process", "Try again");
        if ($isUpdated) showAlert(true, "Password updated", "check your mail");
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/forgot.js"></script>
</body>

</html>