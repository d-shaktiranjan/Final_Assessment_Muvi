<?php

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) header("location: index.php");

$isAdded = false;
$isError = false;
$reason = "";
include "utils/alert.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get form data
    $userName = $_POST["userName"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $designation = $_POST["designation"];

    // check user in db
    include "utils/conn.php";
    $check = "SELECT * FROM `employee` WHERE email='$email'";
    $checkResult = mysqli_query($conn, $check);
    $checkData = mysqli_fetch_assoc($checkResult);
    // add user
    if ($checkData == null) {
        include "utils/password.php";
        include "utils/send.php";
        $password = generatePassword();
        $status = sendMail($email, $userName, $password);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `employee` (`name`, `email`, `mobile`, `designation`, `password`) VALUES ('$userName', '$email', '$mobile', '$designation', '$hash')";
        $res = mysqli_query($conn, $sql);
        if ($res) $isAdded = true;
        else {
            $isError = true;
            $reason = "Internal error";
        }
    } else {
        $isError = true;
        $reason = "Already registered";
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
    <title>Signup</title>
</head>

<body>
    <?php include_once "utils/navbar.php" ?>
    <div class="container">
        <h2>Signup Here</h2>
        <hr>
        <form method="POST">
            <div class="mb-3">
                <label for="userName" class="form-label">Name</label>
                <input type="text" class="form-control" id="userName" name="userName" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile Number (Optional)</label>
                <input type="number" class="form-control" id="mobile" name="mobile">
            </div>
            <div class="mb-3">
                <label for="designation" class="form-label">Designation</label>
                <input type="text" class="form-control" id="designation" name="designation" required>
            </div>
            <button type="submit" class="btn btn-primary">Signup</button>
            <a href="index.php" type="button" class="btn btn-primary">Already have an account</a>
        </form>
        <?php
        if ($isAdded) showAlert(true, "Check your mail", "And login");
        if ($isError) showAlert(false, $reason, "Try again later");
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>