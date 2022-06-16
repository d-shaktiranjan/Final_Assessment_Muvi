<?php
// http://localhost/final/api/getEmployeeName.php
include "../utils/conn.php";

$sql = "SELECT eid,name FROM `employee`";
$res = mysqli_query($conn, $sql);
$nameList = array();
while ($data = mysqli_fetch_assoc($res)) {
    $nameList[$data["eid"]] = $data["name"];
}
echo json_encode($nameList);