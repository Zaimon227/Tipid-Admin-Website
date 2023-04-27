<?php
require "DBConfig.php";

$id = $_GET['id'];

$sql = "SELECT * FROM expenses WHERE id = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Expense</title>
    <link rel="stylesheet" type="text/css" href="tipid_style.css">
</head>
<body>
    <div class="background_container">
        <div class="overlay_container">
            <form class="add_form" method="post" action="editExpense_process.php?id=<?php echo $id;?>">
                <div class="close">
                    <a href="expenses.php"><img src="graphics/icon_exit.png" alt="Cancel" width="20" height="20"></a>
                </div>
                <div>
                    <h1 class="add_header">Edit Expense</h1>
                    User ID:<br>
                    <input class="add_input" type="number" name="UserID" value="<?php echo $row['user_id'];?>" readonly><br>
                    Expense Name:<br>
                    <input class="add_input" type="text" name="Name" value="<?php echo $row['name'];?>"><br>
                    Category:<br>
                    <select class="add_input" name="Category" value="<?php echo $row['category'];?>">
                            <option value="Food/Drinks">Food/Drinks</option>
                            <option value="Transportation">Transportation</option>
                            <option value="Education/Work">Education/Work</option>
                            <option value="Hobbies/Sports">Hobbies/Sports</option>
                            <option value="Miscellaneous">Miscellaneous</option>
                    </select><br>
                    Expense Cost:<br>
                    <input class="add_input" type="number" name="Cost" value="<?php echo $row['cost'];?>"><br>
                    Expense Date:<br>
                    <input class="add_input" type="date" name="Date" value="<?php echo $row['date'];?>"><br>
                    <button class="add_button" type="submit" name="Submit">Apply</button>
                <div>
            </form>
        </div>
    </div>
    
</body>
</html>