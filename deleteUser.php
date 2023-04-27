<?php
require "DBConfig.php";

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$username = $row['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Archive User</title>
    <link rel="stylesheet" type="text/css" href="tipid_style.css">
</head>
<body>
    <div class="background_container">
        <div class="overlay_container">
            <div class="delete_form">
                <h1 class="delete_header">Archive User</h1>
                <p class="delete_dialog">Are you sure you want to archive user <?php echo $username;?>?</p><br>
                <a class="delete_button" href="users.php">Cancel</a>
                <a class="delete_button" href="deleteUser_process.php?id=<?php echo $id;?>">Archive</a>
            </div>
        </div>
    </div>

</body>
</html>