<?php
require "DBConfig.php";

$id = $_GET['id'];

$sql = "SELECT * FROM saving_goals WHERE id = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Savings Goal</title>
    <link rel="stylesheet" type="text/css" href="tipid_style.css">
</head>
<body>
    <div class="background_container">
        <div class="overlay_container">
            <form class="add_form" method="post" action="editSavingGoal_process.php?id=<?php echo $id;?>">
                <div class="close">
                    <a href="savingGoals.php"><img src="graphics/icon_exit.png" alt="Cancel" width="20" height="20"></a>
                </div>
                <div>
                    <h1 class="add_header">Edit Savings Goal</h1>
                    User ID:<br>
                    <input class="add_input" type="number" name="UserID" value="<?php echo $row['user_id'];?>" readonly><br>
                    Goal Name:<br>
                    <input class="add_input" type="text" name="Name" value="<?php echo $row['name'];?>"><br>
                    Goal Amount:<br>
                    <input class="add_input" type="text" name="GoalAmount" value="<?php echo $row['goal_amount'];?>"><br>
                    <button class="add_button" type="submit" name="Submit">Apply</button>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>