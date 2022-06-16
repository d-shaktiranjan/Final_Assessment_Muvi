<?php

include "utils/conn.php";
$sql = "SELECT * FROM `er_data`";
$res = mysqli_query($conn, $sql);

function getUserName($id)
{
    $sql = "SELECT name FROM `employee` WHERE eID=$id";
    $res = mysqli_query($GLOBALS["conn"], $sql);
    $about = mysqli_fetch_assoc($res);
    return $about["name"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/view.css">
    <title>View All ER</title>
</head>

<body>
    <?php include_once "utils/navbar.php" ?>
    <div class="container mt-3">
        <input type="text" name="" id="search" class="search" placeholder="Search">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Descriptions</th>
                    <th scope="col">Category</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Effort</th>
                    <th scope="col">Pod</th>
                    <th scope="col">Assigned to</th>
                    <th scope="col">View File</th>
                </tr>
            </thead>
            <tbody id="table">
                <?php
                $count = 1;
                while ($data = mysqli_fetch_assoc($res)) {
                    echo '<tr>
                    <th scope="row">' . $count++ . '</th>
                    <td>' . $data["title"] . '</td>
                    <td>' . $data["descriptions"] . '</td>
                    <td>' . $data["category"] . '</td>
                    <td>' . $data["priority"] . '</td>
                    <td>' . $data["effort"] . '</td>
                    <td>' . $data["pod"] . '</td>
                    <td>' . getUserName($data["assignTo"]) . '</td>
                    <td>' . $data["file"] . '</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- BS JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JQuerey CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/view.js"></script>
</body>

</html>