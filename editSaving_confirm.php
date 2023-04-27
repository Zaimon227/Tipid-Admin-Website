<?php
require "DBConfig.php";

$id = $_GET['id'];

$sql = "SELECT * FROM savings WHERE id = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$user_id = $row['user_id'];
$amount = $row['amount'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Savings</title>
    <link rel="stylesheet" type="text/css" href="tipid_style.css">
</head>
<body>
    <div class="background_container">
        <div class="overlay_container">
            <div class="delete_form_payment">
                <h1 class="delete_header">Edit Savings</h1>
                <p class="delete_dialog">Are you sure you want to edit Savings record <?php echo $id;?> of User ID <?php echo $user_id;?> with an amount of <?php echo $amount;?>?</p><br>
                <a class="delete_button" href="savings.php">Cancel</a>
                <a class="delete_button" href="editSaving.php?id=<?php echo $id;?>">Edit</a>
            </div>
        </div>
    </div>

</body>
</html>