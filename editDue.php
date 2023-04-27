<?php
require "DBConfig.php";

$id = $_GET['id'];

$sql = "SELECT * FROM dues WHERE id = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Due</title>
    <link rel="stylesheet" type="text/css" href="tipid_style.css">
</head>
<body>
    <div class="background_container">
        <div class="overlay_container">
            <form class="add_form" method="post" action="editDue_process.php?id=<?php echo $id;?>">
                <div class="close">
                    <a href="dues.php"><img src="graphics/icon_exit.png" alt="Cancel" width="20" height="20"></a>
                </div>
                <div>
                    <h1 class="add_header">Edit Due</h1>
                    User ID:<br>
                    <input class="add_input" type="number" name="UserID" value="<?php echo $row['user_id'];?>" readonly><br>
                    Due Name:<br>
                    <input class="add_input" type="text" name="Name" value="<?php echo $row['name'];?>"><br>
                    Due Cost:<br>
                    <input class="add_input" type="text" name="Cost" value="<?php echo $row['cost'];?>"><br>
                    Payment Date:<br>
                    <input class="add_input" type="date" name="Date" value="<?php echo $row['date'];?>"><br>
                    <button class="add_button" type="submit" name="Submit">Apply</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>