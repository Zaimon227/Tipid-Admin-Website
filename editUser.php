<?php
require "DBConfig.php";

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" type="text/css" href="tipid_style.css">
</head>
<body>
    <div class="background_container">
        <div class="overlay_container">
            <div class="add_form_expense">
                    <div class="close">
                        <a href="users.php"><img src="graphics/icon_exit.png" alt="Cancel" width="20" height="20"></a>
                    </div>
                <form method="post" action="editUser_process.php?id=<?php echo $id;?>">
                    <h1 class="add_header">Edit User</h1>
                    Username:<br>
                    <input class="add_input" type="text" name="Username" value="<?php echo $row['username'];?>"><br>
                    Monthly Earnings:<br>
                    <input class="add_input" type="number" name="MonthlyEarnings" value="<?php echo $row['monthly_earnings'];?>"><br>
                    <button class="edit_button" type="submit" name="Submit">Apply</button>
                </form>
                <br>
                <form method="post" action="editPassword_process.php?id=<?php echo $id;?>">
                    Password:<br>
                    <input class="add_input" type="password" name="Password"><br>
                    <button class="change_button" type="submit" name="Submit">Change</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>