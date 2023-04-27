<?php
require "DBConfig.php";

$id = $_GET['id'];

$sql = "SELECT * FROM debts WHERE id = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$name = $row['name'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Debt</title>
    <link rel="stylesheet" type="text/css" href="tipid_style.css">
</head>
<body>
    <div class="background_container">
        <div class="overlay_container">
            <div class="delete_form_expense">
                <h1 class="delete_header">Edit Debt</h1>
                <p class="delete_dialog">Are you sure you want to edit Debt record <?php echo $id;?> named <?php echo $name;?>?</p><br>
                <a class="delete_button" href="debts.php">Cancel</a>
                <a class="delete_button" href="editDebt.php?id=<?php echo $id;?>">Edit</a>
            </div>
        </div>
    </div>

</body>
</html>