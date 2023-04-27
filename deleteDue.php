<?php
require "DBConfig.php";

$id = $_GET['id'];

$sql = "SELECT * FROM dues WHERE id = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$name = $row['name'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Archive Due</title>
    <link rel="stylesheet" type="text/css" href="tipid_style.css">
</head>
<body>
    <div class="background_container">
        <div class="overlay_container">
            <div class="delete_form">
                <h1 class="delete_header">Archive Due</h1>
                <p class="delete_dialog">Are you sure you want to archive due record <?php echo $id;?> named <?php echo $name;?>?</p><br>
                <a class="delete_button" href="dues.php">Cancel</a>
                <a class="delete_button" href="deleteDue_process.php?id=<?php echo $id;?>">Archive</a>
            </div>
        </div>
    </div>

</body>
</html>