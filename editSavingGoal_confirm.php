<?php
require "DBConfig.php";

$id = $_GET['id'];

$sql = "SELECT * FROM saving_goals WHERE id = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$name = $row['name'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Saving Goal</title>
    <link rel="stylesheet" type="text/css" href="tipid_style.css">
</head>
<body>
    <div class="background_container">
        <div class="overlay_container">
            <div class="delete_form_goal">
                <h1 class="delete_header">Edit Saving Goal</h1>
                <p class="delete_dialog">Are you sure you want to delete saving goal record <?php echo $id;?> named <?php echo $name;?>?</p><br>
                <a class="delete_button" href="savingGoals.php">Cancel</a>
                <a class="delete_button" href="editSavingGoal.php?id=<?php echo $id;?>">Edit</a>
            </div>
        </div>
    </div>

</body>
</html>