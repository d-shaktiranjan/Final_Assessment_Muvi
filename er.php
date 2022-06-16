<?php
session_start();
if (!$_SESSION['loggedin']) header("location: index.php");
include "utils/alert.php";
$isAdded = false;
$isError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "utils/conn.php";

    $title = $_POST["title"];
    $descriptions = $_POST["descriptions"];
    $category = $_POST["category"];
    $priority = $_POST["priority"];
    $effort = $_POST["effort"];
    $pod = $_POST["pod"];
    $assignTo = $_POST["assignTo"];

    $fileName = $_FILES['file']['name'];
    $tempFile = $_FILES['file']['tmp_name'];
    $path = "./static/" . $fileName;
    move_uploaded_file($tempFile, $path);

    $sql = "INSERT INTO `er_data` (`title`, `descriptions`, `category`, `priority`, `effort`, `pod`, `assignTo`, `file`) VALUES ('$title', '$descriptions', '$category', '$priority', '$effort', '$pod', '$assignTo', '')";
    $res = mysqli_query($conn, $sql);
    if ($res) $isAdded = true;
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
    <title>Login Here</title>
</head>

<body>
    <?php include_once "utils/navbar.php" ?>
    <div class="container">
        <h2>Add ER</h2>
        <hr>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form mb-3">
                <label for="descriptions" class="form-label">Descriptions</label>
                <textarea class="form-control" id="descriptions" name="descriptions" style="height: 100px"
                    required></textarea>
            </div>
            <div class="row">
                <div class="form mb-3 col">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category" required>
                        <option value="" hidden>Select</option>
                        <option value="bug">Bug</option>
                        <option value="design">Design</option>
                        <option value="api">API</option>
                    </select>
                </div>
                <div class="form mb-3 col">
                    <label for="priority" class="form-label">Priority</label>
                    <select class="form-select" id="priority" name="priority" required>
                        <option value="" hidden>Select</option>
                        <option value="high">High</option>
                        <option value="mid">Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>
                <div class="form mb-3 col">
                    <label for="effort" class="form-label">Effort</label>
                    <select class="form-select" id="effort" name="effort" required>
                        <option value="" hidden>Select</option>
                        <option value="high">High</option>
                        <option value="mid">Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form mb-3 col">
                    <label for="pod" class="form-label">Pod/Department</label>
                    <select class="form-select" id="pod" name="pod" required>
                        <option value="" hidden>Select</option>
                        <option value="backend">Backend</option>
                        <option value="frontend">Frontend</option>
                        <option value="testing">Testing</option>
                    </select>
                </div>
                <div class="form mb-3 col">
                    <label for="assignTo" class="form-label">Assigned to</label>
                    <select id="datalistOptions" name="assignTo">
                    </select>
                </div>
                <div class="mb-3 col">
                    <label for="file" class="form-label">Add Attachment</label>
                    <input type="file" class="form-control" id="file" name="file">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
        if ($isAdded) showAlert(true, "Your ER added", "");
        if ($isError) showAlert(false, "Sorry unable to add", "Try after some time");
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>