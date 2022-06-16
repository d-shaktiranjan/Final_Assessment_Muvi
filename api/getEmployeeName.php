<?php
// http://localhost/final/api/getEmployeeName.php
include "../utils/conn.php";

$sql = "SELECT name FROM `employee`";
$res = mysqli_query($conn, $sql);
$nameList = array();
$count = 0;
while ($data = mysqli_fetch_assoc($res)) {
    $nameList[$count++] = $data["name"];
}
echo json_encode($nameList);