<?php
require "DBConfig.php";

$id = $_GET['id'];

$sql = "SELECT * FROM expenses WHERE id = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$name = $row['name'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Archivve Expense</title>
    <link rel="stylesheet" type="text/css" href="tipid_style.css">
</head>
<body>
    <div class="background_container">
        <div class="overlay_container">
            <div class="delete_form_expense">
                <h1 class="delete_header">Archive Expense</h1>
                <p class="delete_dialog">Are you sure you want to archive expense record <?php echo $id;?> named <?php echo $name;?>?</p><br>
                <a class="delete_button" href="expenses.php">Cancel</a>
                <a class="delete_button" href="deleteExpense_process.php?id=<?php echo $id;?>">Archive</a>
            </div>
        </div>
    </div>
</body>
</html>