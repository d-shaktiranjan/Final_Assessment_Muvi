<?php
// http://localhost/final/api/checkUser.php?email=email
include "../utils/conn.php";

$email = $_GET["email"];
$sql = "SELECT email FROM `employee` WHERE email='$email'";
$res = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($res);
echo json_encode($data);